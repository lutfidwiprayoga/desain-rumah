@extends('layout_admin.v_template')

@section('content')

<h1>Edit/Update Desain</h1>
<div class="card">
    <div class="card-body">
            <form action="{{route('desain.update',$desains->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama" class="col-form-label">Nama Desain</label>
                    <input type="text" name="nama" class="form-control" value="{{ $desains->nama }}">
                        @error('nama')
                                <strong>{{ $message }}</strong>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="kategori">Kategori</label>
                        <select class="form-control" name="kategori_id">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                        @error('kategori')
                                <strong>{{ $message }}</strong>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="harga" class="col-form-label">Harga</label>
                    <input type="text" name="harga" class="form-control" placeholder="Tidak perlu menggunakan simbol Rp">
                    @error('harga')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="tipe" class="col-form-label">Tipe Bangunan</label>
                    <input type="text" name="tipe" class="form-control" value="{{ $desains->tipe}}">
                        @error('tipe')
                                <strong>{{ $message }}</strong>
                        @enderror
                </div>
                
                <div class="form-group">
                    <label for="foto_desain" class="col-form-label">Foto</label>
                        <input type="file" name="foto_desain" class="form-control" value="{{ $desains->foto_desain }}">
                        @error('foto_desain')
                                <strong>{{ $message }}</strong>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="foto_desain" class="col-form-label">Tampak Kiri</label>
                        <input type="file" name="tampak_samping_kiri" class="form-control" value="{{ $desains->tampak_samping_kiri }}" placeholder="Ukuran foto maksimal 2MB">
                        @error('tampak_samping_kiri')
                                <strong>{{ $message }}</strong>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="foto_desain" class="col-form-label">Tampak Kanan</label>
                        <input type="file" name="tampak_samping_kanan" class="form-control" value="{{ $desains->tampak_samping_kanan }}" placeholder="Ukuran foto maksimal 2MB">
                        @error('tampak_samping_kanan')
                                <strong>{{ $message }}</strong>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" name="keterangan" rows="3" placeholder="Detail desain beserta ukuran"></textarea>
                        @error('keterangan')
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