@extends('layouts.app')

@section('content')
{{-- <script>
    $(document).on('click', function editPage(id){
        id.preventDefault();
    //    var divisi_id = id
       $('#tes').val(id)
       $('#editModal').modal('show');

   });
    
</script> --}}
<div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-success">
                <div class="card-body">
                    <a data-toggle="modal" data-target="#exampleModal" class="btn btn-primary mb-3">Create Permohonan</a>
                    @include('divisi.divisi-create')
                    <table class="table table-striped table-bordered border-success" id="table-divisi">
                        <thead>
                            <tr>
                                <th>No</th>                      
                                <th>Nama Divisi</th>                      
                                <th>Kode Divisi</th>                      
                                <th>Aksi</th>                      
                            </tr>                    
                        </thead>
                    </table>
                    {{-- @include('divisi.divisi-edit') --}}
                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                                <h3>Form <strong class="text-success">Divisi</strong></h3>

                                <h5> <input type="text" id="tes"> </h5>
                                
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-success alert-block" style="display: none;">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                </div>
                                {{-- <form id="divisiEdit" action="{{ route('divisis.update', $list_divisi->id) }}" method="POST">
                                    @method('PUT')        
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col-md-4 text-right">
                                            <label for="nama_divisi" class="control-label col-form-label">Nama divisi</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control @error('nama_divisi') is-invalid @enderror" id="nama_divisi" name="nama_divisi" value="{{ $list_divisi->nama_divisi }}" placeholder="Nama divisi . . ." required>
                                            @error('nama_divisi')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-4 text-right">
                                            <label for="kode_divisi" class="control-label col-form-label">Kode divisi</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control @error('kode_divisi') is-invalid @enderror" id="kode_divisi" name="kode_divisi" value="{{ $list_divisi->nama_divisi }}" placeholder="Kode divisi . . ." required>
                                            @error('kode_divisi')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </form> --}}
                          </div>
                        </div>
                      </div>                    
                </div>
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

            $('#divisiInput').submit(function(e){
                var routePost = '{{ route('divisis.store') }}';
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
                                data: $('#divisiInput').serialize(),
                                type: "json",
                            });
                            $.alert({
                                type:'success',
                                theme: 'modern',
                                content: '',
                                title:'Divisi Sukses Dibuat',
                                buttons:{
                                    'Ok': function(){
                                        return window.location.href = '{{ route('divisis.index') }}'
                                    }
                                }
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
    {{-- <script>
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $(document).ready(function(){

            $('#editInput').submit(function(e){
                var routePost = '{{ route('divisis.update', $list_divisi->id) }}';
                e.preventDefault();

                $.confirm({
                    title: 'Update!',
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
                                data: $('#editInput').serialize(),
                                type: "json",
                            });
                            $.alert({
                                type:'success',
                                theme: 'modern',
                                content: '',
                                title:'Divisi Sukses Dibuat',
                                buttons:{
                                    'Ok': function(){
                                        return window.location.href = '{{ route('divisis.index') }}'
                                    }
                                }
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
    </script> --}}
    <script>
        $(document).ready(function(){
            var t = $('#table-divisi').DataTable({
                columnDefs: [{
                    searchable: false,
                    orderable: false,
                    targets: 0
                }],
                serverSide : true,
                ajax : {
                    url: "{{ url('list-divisi') }}",
                    type: 'GET',
                },
                columns : [
                    {data:'id', name:'id', className:'text-center'},
                    {data:'nama_divisi', name:'nama_divisi', className:'text-center'},
                    {data:'kode_divisi', name:'kode_divisi', className:'text-center'},
                    {data:'action', orderable:false, className:'text-center align-middle'}
                ],
                order: [[1,'asc']]
            });
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
                } );
            }).draw();
        });
    </script>
    <script>
        $(document).on('click', function editPage(id){
            // id.preventDefault();
        //    var divisi_id = id
           $('#tes').val(id)
           $('#editModal').modal('show');
    
       });
        
    </script>
@endpush