@extends('layout_admin.v_template')

@section('content')

<form action="/desainer/insert" method="POST" enctype="multipart/form-data">
    @csrf

    <h1>Tambah Data Desainer</h1>
    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-left">Nama Lengkap</label>
        <div class="col-md-6">
            <input name="name" type="text" class="form-control" value="{{ old('name')}}">
            @error('name')
                <strong>{{ $message }}</strong>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-left">Email</label>
        <div class="col-md-6">
            <input type="email" name="email" class="form-control" value="{{ old('email')}}">
            @error('email')
                <strong>{{ $message }}</strong>
            @enderror
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-left">No Handphone</label>
        <div class="col-md-6">
            <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp')}}">
            @error('no_hp')
                <strong>{{ $message }}</strong>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-left">Alamat</label>
        <div class="col-md-6">
            <input type="text" name="alamat"class="form-control" value="{{ old('alamat')}}">
            @error('alamat')
                <strong>{{ $message }}</strong>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-left">NIK</label>
        <div class="col-md-6">
            <input type="text" name="nik" class="form-control" value="{{ old('nik')}}">
            @error('nik')
                <strong>{{ $message }}</strong>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-left">Jenis Kelamin</label>
        <div class="col-md-6">
            <select class="form-control" name="jenis_kelamin">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            @error('jenis_kelamin')
                    <strong>{{ $message }}</strong>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-left">Foto</label>
        <div class="col-md-6">
            <input type="file" name="foto" class="form-control">
            @error('foto')
                    <strong>{{ $message }}</strong>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2 offset-md-2">
            <button type="submit" class="btn btn-primary">
                Simpan
            </button>
        </div>
    </div>
    
</form>

@endsection