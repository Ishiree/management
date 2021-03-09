<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_divisi = Divisi::all();
        return view('divisi.divisi-index', compact('list_divisi', $list_divisi));
    }

    public function divisiQuery(Request $request)
    {
        
        $list_divisi = Divisi::all();
        if($request->ajax()){
            return datatables()->of($list_divisi)->addColumn('action', function ($list_divisi) {
                return '<a class="text-primary" onclick="editPage()" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>     
                <a href="/divisis/delete" class="text-primary"><i class="fas fa-trash"></i></a>';})->ToJson();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'nama_divisi' => 'required',
            'kode_divisi' => 'required',
        ]);

        if(!$validator->fails()){
            $var = new Divisi;
            $var->nama_divisi = $request->nama_divisi;
            $var->kode_divisi = $request->nama_divisi;
            $var->save();
            return redirect()->route('divisis.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'nama_divisi' => 'required',
            'kode_divisi' => 'required',
        ]);

        $divisi = Divisi::findOrFail($id);
        $divisi->nama_divisi = $request->nama_divisi;
        $divisi->kode_divisi = $request->kode_divisi;
        $divisi->update();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
