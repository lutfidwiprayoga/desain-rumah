@extends('layout_admin.v_template')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('port.insert')}}" method="POST" enctype="multipart/form-data">
            @csrf                           
                <div class="form-group">
                    <label for="foto_desain" class="col-form-label">Gambar Portfolio</label>
                        <input type="file" name="portfolio" class="form-control" placeholder="Ukuran foto maksimal 2MB">
                        @error('portfolio')
                                <strong>{{ $message }}</strong>
                        @enderror
                </div>
    
                <div class="form-group">
                    <label for="keterangan">Caption</label>
                    <textarea class="form-control" name="caption" rows="3" placeholder="Detail Caption Dari Portfolio Anda"></textarea>
                        @error('caption')
                                <strong>{{ $message }}</strong>
                        @enderror
                </div>
            

            <div class="form-group">
                <div class="col-md offset-md-5">
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </div>


        </form>    
    </div>
</div>
@endsection