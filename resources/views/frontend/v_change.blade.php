@extends('layout_admin.v_template')

@section('content')
<div class="container">

    @if (session('successData'))
    <div class="alert alert-icon">
<button type="button" class="close" data-dismiss="alert" aria-label="close">
<span aria-hidden="true">&times;</span>
</button>
<i class="mdi mdi-check-all"></i>
<strong></strong>{{session('successData')}}
    </div>
@endif

    <div class="row justify-content-center">
        <div class="col-md-6">

            {{-- Detail User --}}
            <div class="card">
                <div class="card-body">
                    <div class="user-avatar text-center d-block">
                        <img src="{{ asset('foto/'. Auth::user()->foto)}}" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                    </div>
                    <div class="text-center">
                        <h2 class="font-24 mb-0">{{ Auth::user()->name }}</h2>
                        <p>You're Part of Artech Design</p>
                    </div>
                </div>
                <div class="card-body border-top">
                    <h3 class="font-16">Contact Information</h3>
                    <div class="">
                        <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="fas fa-fw fa-clipboard mr-2"></i>{{ Auth::user()->nik }}</li>
                        <li class="mb-2"><i class="fas fa-fw fa-home mr-2"></i>{{ Auth::user()->alamat }}</li>
                        <li class="mb-2"><i class="fas fa-fw fa-phone mr-2"></i>{{ Auth::user()->no_hp }}</li>
                    </ul>
                    </div>
                </div>
                </div>

            {{-- Update Profile --}}
            <h2>Lengkapi Data Diri</h2>
            <div class="card">    
                <div class="card-body">
                    <form method="POST" action="{{ route('profil.update') }}" enctype="multipart/form-data"> 
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">{{ __('Nama Lengkap') }}</label>
                            <div class="col-md-6">
                                <input name="name" type="text" class="form-control" value="{{ auth()->user()->name }}">
                                @error('name')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input name="email" type="email" class="form-control" value="{{ auth()->user()->email }}">
                                @error('email')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">{{ __('No Handphone') }}</label>
                            <div class="col-md-6">
                                <input name="no_hp" type="text" class="form-control" value="{{ auth()->user()->no_hp }}">
                                @error('no_hp')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">{{ __('Alamat') }}</label>
                            <div class="col-md-6">
                                <input name="alamat" type="text" class="form-control" value="{{ auth()->user()->alamat }}">
                                @error('alamat')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">{{ __('NIK') }}</label>
                            <div class="col-md-6">
                                <input name="nik" type="text" class="form-control" value="{{ auth()->user()->nik }}">
                                @error('nik')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">{{ __('Jenis Kelamin') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="jenis_kelamin" name="jenis_kelamin" value="{{ auth()->user()->jenis_kelamin }}">
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
                            <label class="col-md-4 col-form-label text-md-left">{{ __('Nomor Rekening') }}</label>
                            <div class="col-md-6">
                                <input name="no_rekening" type="text" class="form-control" value="{{ auth()->user()->no_rekening}}">
                                @error('no_rekening')
                                        <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">{{ __('Foto') }}</label>
                            <div class="col-md-6">
                                <input name="foto" type="file" class="form-control">
                                @error('foto')
                                        <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">{{ __('Profile') }}</label>
                            <div class="col-md-6">
                                <textarea name="profile" type="text" class="form-control" placeholder="{{ auth()->user()->profile}}"></textarea>
                                @error('profile')
                                        <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Profile
                                </button>
                            </div>
                        </div>
                    </form>       
                </div>
            </div>
            
        </div>

        {{-- Update Password --}}
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('password.ganti') }}">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">{{ __('Password Lama') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password">
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">{{ __('Password Baru') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-left">{{ __('Konfirmasi Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection