@extends('frontend.v_index')
@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="200px" height="150px" src="{{url('foto/'. $user->foto)}}"><span class="font-weight-bold">{{auth()->user()->name}}</span><span class="text-black-50">{{auth()->user()->email}}</span><span> </span></div>
            <hr>
            <a href="/proses-desain" class="btn btn-link">Proses</a>
            <hr>
            <a href="/desain-selesai" class="btn btn-link">Selesai</a>
            <hr>
        </div>
        <div class="col-md-9 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form action="{{route('profile.post')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Nama Lengkap</label><input type="text" class="form-control" name="name"></div>
                    <div class="col-md-12"><label class="labels">Alamat Email</label><input type="text" class="form-control" name="email"></div>
                    <div class="col-md-12"><label class="labels">No Handphone</label><input type="text" class="form-control" name="no_hp"></div>
                    <div class="col-md-12"><label class="labels">Alamat</label><input type="text" class="form-control" name="alamat"></div>
                    <div class="col-md-12"><label class="labels">Jenis Kelamin</label><select class="form-control" name="jenis_kelamin">                    
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    </div>
                    <div class="col-md-12"><label class="labels">Upload Foto Profile</label><input type="file" class="form-control" placeholder="enter address line 2" name="foto"></div>
                    </div>
                
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </form>
            </div>    
        </div>
    </div>
</div>
</div>
</div>    
@endsection