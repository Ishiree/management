@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card border-success">
            <div class="card-body">
                <a data-toggle="modal" data-target="#exampleModal" class="btn btn-primary mb-3">Create bank</a>
                @include('bank.bank-create')
                <table class="table table-striped table-bordered border-success" id="table-bank">
                    <thead>
                        <tr>
                            <th>No</th>                      
                            <th>Nama bank</th>                      
                            <th>Aksi</th>                      
                        </tr>                    
                    </thead>
                </table>
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

        $('#bankInput').submit(function(e){
            var routePost = '{{ route('banks.store') }}';
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
                            data: $('#bankInput').serialize(),
                            type: "json",
                        });
                        $.alert({
                            type:'success',
                            theme: 'modern',
                            content: '',
                            title:'bank Sukses Dibuat',
                            buttons:{
                                'Ok': function(){
                                    return window.location.href = '{{ route('banks.index') }}'
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
<script>
    $(document).ready(function(){
        var t = $('#table-bank').DataTable({
            columnDefs: [{
                searchable: false,
                orderable: false,
                targets: 0
            }],
            serverSide : true,
            ajax : {
                url: "{{ url('list-bank') }}",
                type: 'GET',
            },
            columns : [
                {data:'id', name:'id', className:'text-center'},
                {data:'nama_bank', name:'nama_bank', className:'text-center'},
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
@endpush