<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h3>Form <strong class="text-success">Permohonan</strong></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="alert alert-success alert-block" style="display: none;">
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>        
            <form id="divisiInput" action="{{ route('divisis.store') }}" method="POST">
            @csrf
                <div class="row form-group">
                    <div class="col-md-4 text-right">
                        <label for="nama_divisi" class="control-label col-form-label">Nama divisi</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control @error('nama_divisi') is-invalid @enderror" id="nama_divisi" name="nama_divisi" placeholder="Nama divisi . . ." required>
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
                        <input type="text" class="form-control" id="kode_divisi" name="kode_divisi" placeholder="Kode divisi . . ." required>
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
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>
                