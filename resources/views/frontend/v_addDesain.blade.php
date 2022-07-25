@extends('layout_admin.v_template')
@section('content')

    <form action="/desains/insert" method="POST" enctype="multipart/form-data">
    @csrf

    <h1>Tambah Desain</h1>
    <div class="card">
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="nama" class="col-form-label">Nama Desain</label>
                    <input type="text" name="nama" class="form-control">
                        @error('nama')
                                <strong>{{ $message }}</strong>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="kategori">Kategori</label>
                        <select class="form-control" name="kategori_id">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $kt)
                            <option value="{{ $kt->id }}">{{ $kt->nama }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                                <strong>{{ $message }}</strong>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="harga" class="col-form-label">Harga</label>
                    <input type="text" name="harga" class="form-control" placeholder="Hanya tulis nominal saja">
                    @error('harga')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="tipe" class="col-form-label">Tipe Bangunan</label>
                    <input type="text" name="tipe" class="form-control">
                        @error('tipe')
                                <strong>{{ $message }}</strong>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="foto_desain" class="col-form-label">Foto Desain</label>
                        <input type="file" name="foto_desain" class="form-control @error('foto_desain') is-invalid @enderror" placeholder="Ukuran foto maksimal 2MB">
                        @error('foto_desain')
                                <strong>{{ $message }}</strong>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="foto_desain" class="col-form-label">Tampak Kiri</label>
                        <input type="file" name="tampak_samping_kiri" class="form-control @error('tampak_samping_kiri') is-invalid @enderror" placeholder="Ukuran foto maksimal 2MB">
                        @error('tampak_samping_kiri')
                                <strong>{{ $message }}</strong>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="foto_desain" class="col-form-label">Tampak Kanan</label>
                        <input type="file" name="tampak_samping_kanan" class="form-control @error('tampak_samping_kanan') is-invalid @enderror" placeholder="Ukuran foto maksimal 2MB">
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
            </form>

            <div class="form-group">
                <div class="col-md offset-md-5">
                    <button type="submit" class="btn btn-primary">
                        Upload Desain
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection