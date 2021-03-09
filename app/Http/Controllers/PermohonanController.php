<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Divisi;
use App\Models\Permohonan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    { 
        $list_divisi = Divisi::all();
        return view('permohonan.permohonan-index', compact('list_divisi'));
    }
    
    public function permohonanQuery(Request $request)
    {
        
        if($request->ajax()){
            switch (Auth::user()->hak_akses_id) {
                case '2':
                    $list_permohonan_query = Permohonan::query();
                    $list_permohonan = $list_permohonan_query
                    ->where('user_id', Auth::user()->id)
                    ->join('users', 'permohonans.user_id', '=', 'users.id')
                        ->join('divisis', 'users.divisi_id', '=', 'divisis.id')
                        ->select('permohonans.*', 'divisis.nama_divisi as nama_divisi');
                        
                        return datatables()->of($list_permohonan)
                        ->addColumn('action', function ($list_permohonan) {
                            return '<a href="/permohonans/' . $list_permohonan->id . '" class="text-primary"><i class="fas fa-search"></i></a>';
                            })->ToJson();
                            break;
                case '1':
                    $list_permohonan_query = Permohonan::query();
                    $list_permohonan = $list_permohonan_query
                           ->join('users', 'permohonans.user_id', '=', 'users.id')
                           ->join('divisis', 'users.divisi_id', '=', 'divisis.id')
                           ->select('permohonans.*', 'divisis.nama_divisi as nama_divisi');
                                
                        return datatables()->of($list_permohonan)
                        
                        ->addColumn('action', function ($list_permohonan) {
                            return '<a href="/permohonans/' . $list_permohonan->id . '" class="text-primary"><i class="fas fa-search"></i></a>
                            <a href="/permohonans/' . $list_permohonan->id . '/edit" class="text-primary"><i class="fas fa-edit"></i></a>     
                            <a href="/permohonans/' . $list_permohonan->id . '/approve" class="text-primary"><i class="fas fa-check"></i></a>';})
                        ->ToJson();
                        break;
                case '3':
                    $list_permohonan_query = Permohonan::query();
                    $list_permohonan = $list_permohonan_query
                           ->join('users', 'permohonans.user_id', '=', 'users.id')
                           ->join('divisis', 'users.divisi_id', '=', 'divisis.id')
                           ->select('permohonans.*', 'divisis.nama_divisi as nama_divisi');
                                
                        return datatables()->of($list_permohonan)
                        
                        ->addColumn('action', function ($list_permohonan) {
                            return '<a href="/permohonans/' . $list_permohonan->id . '" class="text-primary"><i class="fas fa-search"></i></a>
                            <a href="/permohonans/' . $list_permohonan->id . '/edit" class="text-primary"><i class="fas fa-edit"></i></a>     
                            <a href="/permohonans/' . $list_permohonan->id . '/" id="confirmApprove" class="text-primary"><i class="fas fa-check"></i></a>';})
                        ->ToJson();
                        break;
                case '4':
                    $list_permohonan_query = Permohonan::query();
                    $list_permohonan = $list_permohonan_query
                           ->join('users', 'permohonans.user_id', '=', 'users.id')
                           ->join('divisis', 'users.divisi_id', '=', 'divisis.id')
                           ->select('permohonans.*', 'divisis.nama_divisi as nama_divisi');
                                
                        return datatables()->of($list_permohonan)
                        
                        ->addColumn('action', function ($list_permohonan) {
                            return '<a href="/permohonans/' . $list_permohonan->id . '" class="text-primary"><i class="fas fa-search"></i></a>
                            <a href="/permohonans/' . $list_permohonan->id . '/edit" class="text-primary"><i class="fas fa-edit"></i></a>     
                            <a href="/permohonans/' . $list_permohonan->id . '/status" class="text-primary"><i class="fas fa-check"></i></a>';})
                        ->ToJson();
                        break;
            }
        }    
    }

    public function approve($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        $permohonan->status_berkas = 'approved';
        $permohonan->save();
        return redirect()->route('permohonans.index');
    }
    
    public function rilis($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        $permohonan->status_rilis = 'rilis';
        $permohonan->tanggal_rilis = date( Carbon::now()->addDay()->format('Y-m-d') );
        $permohonan->save();
        return redirect()->route('permohonans.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = Bank::all();

        return view('permohonan.permohonan-create', [
            'banks' => $banks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'judul_permohonan' => 'required',
            'nomor_permohonan' => 'required',
            'jumlah_permohonan' => 'required',
            'bank_id' => 'required',
            'tanggal_permohonan' => 'required',
            'note' => 'max:255',
        ]);

        if (!$validator->fails()) {
            $var = new Permohonan();
            $jumlahPermohonan = $var->jumlah_permohonan = $request->jumlah_permohonan;

            if(!$jumlahPermohonan >= 500001){
                $jenisPermohonan = 'tunai';
            }else{
                $jenisPermohonan = 'transfer';
            }

            $var->judul_permohonan = $request->judul_permohonan;
            $var->nomor_permohonan = $request->nomor_permohonan;
            $var->tanggal_permohonan = $request->tanggal_permohonan;
            $var->bank_id = $request->bank_id;
            $var->user_id = Auth::user()->id;
            $var->note = $request->note;
            $var->jenis_permohonan = $jenisPermohonan;
            $var->save();
            
            return redirect()->route('permohonans.index');
        }

    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        return view('permohonan.permohonan-show', compact('permohonan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banks = Bank::all();
        $permohonan = Permohonan::findOrFail($id);
        return view('permohonan.permohonan-edit', compact('permohonan', 'banks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_permohonan' => 'required',
            'nomor_permohonan' => 'required',
            'jumlah_permohonan' => 'required',
            'bank_id' => 'required',
            'tanggal_permohonan' => 'required',
            'note' => 'max:255',
            'status_berkas' => 'required',
            'status_rilis' => 'required',   
        ]);

        $permohonan = Permohonan::findOrFail($id);
        $permohonan->judul_permohonan = $request->judul_permohonan;
        $permohonan->nomor_permohonan = $request->nomor_permohonan;
        $permohonan->tanggal_permohonan = $request->tanggal_permohonan;
        $permohonan->tanggal_rilis = $request->tanggal_rilis;
        $permohonan->jumlah_permohonan = $request->jumlah_permohonan;
        $permohonan->jenis_permohonan = $request->jenis_permohonan;
        $permohonan->bank_id = $request->bank_id;
        $permohonan->note = $request->note;
        $permohonan->status_berkas = $request->status_berkas;
        $permohonan->status_rilis = $request->status_rilis;
        $permohonan->save();
        
        return redirect()->route('permohonans.index');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        $permohonan->delete();
    }
}
