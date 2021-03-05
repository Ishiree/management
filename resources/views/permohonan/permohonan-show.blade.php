@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3><strong>Rincian</strong> Permohonan</h3>
                    <hr >
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <label for="nomor_permohonan" class="control-label">Nomor Permohonan</label>
                        </div>
                        <div class="col-md-2 text-center">:</div>
                        <div class="col-md-5">
                            <p id="nomor_permohonan">{{ $permohonan->nomor_permohonan }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <label for="judul_permohonan" class="control-label">Judul Permohonan</label>
                        </div>
                        <div class="col-md-2 text-center">:</div>
                        <div class="col-md-5">
                            <p id="judul_permohonan">{{ $permohonan->judul_permohonan }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <label for="jenis_permohonan" class="control-label">Jenis Permohonan</label>
                        </div>
                        <div class="col-md-2 text-center">:</div>
                        <div class="col-md-5">
                            <p id="jenis_permohonan">{{ $permohonan->jenis_permohonan }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <label for="tanggal_permohonan" class="control-label">Tanggal Permohonan</label>
                        </div>
                        <div class="col-md-2 text-center">:</div>
                        <div class="col-md-5">
                            <p id="tanggal_permohonan">{{ $permohonan->tanggal_permohonan }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <label for="jumlah_permohonan" class="control-label">Jumlah Permohonan</label>
                        </div>
                        <div class="col-md-2 text-center">:</div>
                        <div class="col-md-5">
                            <p id="jumlah_permohonan">{{ $permohonan->jumlah_permohonan }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <label for="status_berkas" class="control-label">Status Berkas</label>
                        </div>
                        <div class="col-md-2 text-center">:</div>
                        <div class="col-md-5">
                            <p id="status_berkas">{{ $permohonan->status_berkas }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <label for="status_rilis" class="control-label">Status Rilis</label>
                        </div>
                        <div class="col-md-2 text-center">:</div>
                        <div class="col-md-5">
                            <p id="status_rilis">{{ $permohonan->status_rilis }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <label for="tanggal_rilis" class="control-label">Tanggal Rilis</label>
                        </div>
                        <div class="col-md-2 text-center">:</div>
                        <div class="col-md-5">
                            <p id="tanggal_rilis">{{ $permohonan->tanggal_rilis }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <label for="bank" class="control-label">Bank</label>
                        </div>
                        <div class="col-md-2 text-center">:</div>
                        <div class="col-md-5">
                            <p id="bank">{{ $permohonan->bank->nama_bank }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <label for="note" class="control-label">Note</label>
                        </div>
                        <div class="col-md-2 text-center">:</div>
                        <div class="col-md-5">
                            <p id="note">{{ $permohonan->note }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <label for="prioritas" class="control-label">Prioritas</label>
                        </div>
                        <div class="col-md-2 text-center">:</div>
                        <div class="col-md-5">
                            <p id="prioritas">{{ $permohonan->prioritas }}</p>
                        </div>
                    </div>                
                </div>
            </div>
        </div>
    </div>

@push('scripts')
    
@endpush
@endsection