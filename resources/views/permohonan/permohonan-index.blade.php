@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
        <div class="col-md-10">
            <a href="{{ route('permohonans.create') }}" class="btn btn-success mb-5">Create Permohonan</a>
            <table class="table table-striped table-bordered" id="table-permohonan">
                <thead>
                    <tr>
                        <th rowspan="2" class="align-middle">No</th>
                        <th rowspan="2" class="align-middle">Nomor Permohonan</th>
                        <th rowspan="2" class="align-middle">Judul Permohonan</th>
                        <th rowspan="2" class="align-middle">Divisi</th>
                        <th colspan="2" class="text-center">Status</th>
                        <th rowspan="2" class="align-middle">Aksi</th>                      
                    </tr>
                    <tr>
                        <th>Berkas</th>
                        <th>Rilis</th>
                    </tr>
                    
                </thead>
            </table>
        </div>
    </div>   
</div>    

@endsection
@push('scripts')
<script>
    $(document).on('click', '#confirmApprove', function(e){
    e.preventDefault();
    var link = $(this).attr("href");
        $.confirm({
            title: 'Pilih Aksi!',
            content: '<h3>Approve Berkas | Rilis Status<h4>',
            theme: 'modern',
            columnClass: 'col-md-6 col-md-offset-3',
            icon: 'fas fa-exclamation',
            closeIcon: true,
            draggable: true,
            type:'orange',
            buttons: {
                'Approve':{
                    btnClass:'btn-success', 
                    action:function (confirmed) {
                    if(confirmed){
                        window.location.href ='berkas' + link 
                    }
                }},
                'Rilis': {
                    btnClass: 'btn-info text-white',
                    action:function (confirmed) {
                        if(confirmed){
                            window.location.href ='status' + link
                        }   
                    }
                }
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
      var t = $('#table-permohonan').DataTable({
            columnDefs: [{
                searchable: false,
                orderable: false,
                targets: 0
            }],
            serverSide : true,
            processing : true,
            ajax : {
                url: "{{ url('list-permohonan') }}",
                type: 'GET',
            },
            
            columns:[
                {data: 'id', name: 'id', className: 'text-center'},
                {data:'nomor_permohonan', name:'nomor_permohonan', className: 'text-center'},
                {data:'judul_permohonan', name:'judul_permohonan', className: 'text-center'},
                {data:'nama_divisi', searchable:false ,name:'nama_divisi', className: 'text-center'},
                {
                    data:'status_berkas', 
                    name:'status_berkas',
                    render: function(data, type, row){
                                switch(data){
                                    case "pending": return `<span class="badge badge-primary"><i class="fas fa-clock"></i></span>`
                                    case "approved": return `<span class="badge badge-success"><i class="fas fa-check"></i></span>`
                                    case "rejected": return `<span class="badge badge-danger"><i class="fas fa-cross"></i></span>`
                                }
                            },
                    orderable:false,
                    orderCellsTop: true, 
                    className:'text-center'
                },                
                {
                    data:'status_rilis', 
                    name:'status_rilis',
                    render: function(data, type, row){
                                switch(data){
                                    case "pending": return `<span class="badge badge-primary"><i class="fas fa-clock"></i></span>`
                                    case "rilis": return `<span class="badge badge-success"><i class="fas fa-check"></i></span>`
                                }
                            },
                    orderable:false,
                    orderCellsTop: true, 
                    className:'text-center'
                },                
                {data:'action', orderable:false, className:'text-center align-middle'}
            ],
            order:[[1,'asc']]
        });
        
        t.on( 'draw.dt', function () {
        var PageInfo = $('#table-permohonan').DataTable().page.info();
            t.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            });
        });
    });
    
</script>

@endpush