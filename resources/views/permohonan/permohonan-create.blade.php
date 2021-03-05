@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-purple">
                <div class="card-body">
                    <h3>Form <strong class="text-success">Permohonan</strong></h3>
                    <hr>
                    <div class="alert alert-success alert-block" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>        
                    <form id="formInput" action="{{ route('permohonans.store') }}" method="POST">
                    
                    @csrf
                        <div class="row form-group">
                            <div class="col-md-4 text-right">
                                <label for="nomor_permohonan" class="control-label col-form-label">Nomor Permohonan</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('nomor_permohonan') is-invalid @enderror" id="nomor_permohonan" name="nomor_permohonan" placeholder="Nomor Permohonan..." required>
                                @error('nomor_permohonan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4 text-right">
                                <label for="judul_permohonan" class="control-label col-form-label">Judul Permohonan</label>
                            </div>
                            <div class="col-md-8">
                                <input required type="text" class="form-control" id="judul_permohonan" name="judul_permohonan" placeholder="Judul Permohonan...">
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4 text-right">
                                <label for="jumlah_permohonan" class="control-label col-form-label">Jumlah Permohonan</label>
                            </div>
                            <div class="col-md-8">
                                <input required type="number" class="form-control" id="jumlah_permohonan" name="jumlah_permohonan" placeholder="Jumlah Permohonan...">
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4 text-right">
                                <label for="bank_id" class="control-label col-form-label">Nomor Permohonan</label>
                            </div>
                            <div class="col-md-8">
                                <select required type="text" class="custom-select" id="bank_id" name="bank_id" placeholder="Jenis Bank...">
                                    @foreach ($banks as $bank)
                                    <option value="{{ $bank->id }}">{{ $bank->nama_bank }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4 text-right">
                                <label for="tanggal_permohonan" class="control-label col-form-label">Tanggal Permohonan</label>
                            </div>
                            <div class="col-md-8">
                                <input required type="date" class="form-control" id="tanggal_permohonan" name="tanggal_permohonan" value = "{{ Carbon\Carbon::now()->addDay()->format('Y-m-d') }}">
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4 text-right">
                                <label for="note" class="control-label col-form-label">Note</label>
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control" name="note" id="note" rows="3"></textarea>
                            </div>
                        </div>
                        
                        <div class="text-right">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @push('scripts')
    <script>
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $(document).ready(function(){

            $('#formInput').submit(function(e){
                var routePost = '{{ route('permohonans.store') }}';
                e.preventDefault();

                $.confirm({
                    title: 'Buat Permohonan?',
                    content: '<h4>Pastikan data Sudah Benar!<h4>',
                    theme: 'modern',
                    columnClass: 'col-md-6 col-md-offset-3',
                    icon: 'fas fa-exclamation',
                    closeIcon: true,
                    draggable: true,
                    type:'orange',
                    buttons:{
                        confirm: function () {
                            $.ajax({
                                url: routePost,
                                method: "POST",
                                data: $('#formInput').serialize(),
                                type: "json",
                            });
                            return $.alert({
                                type:'success',
                                theme: 'modern',
                                title:'Permohonan Sukses Dibuat'
                            });
                        },
                        cancel: function () {
                        $.alert('Canceled!');
                        }
                    }
                });
            });
            function printMsg (msg) {
              if($.isEmptyObject(msg.error)){
                  console.log(msg.success);
                  $('.alert-block').css('display','block').append('<strong>'+msg.success+'</strong>');
              }else{
                $.each( msg.error, function( key, value ) {
                  $('.'+key+'_err').text(value);
                });
              }
            }
        });
    </script>
    @endpush