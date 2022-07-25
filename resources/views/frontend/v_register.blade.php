<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('title')}}/title.png" type="image/title-icon">
    <title>Register  | Artech</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('template_1')}}/asset/register/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('template_1')}}/asset/register/css/style.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> --}}
</head>
<body>

    <div class="main">

        <section class="signup">
            <div class="container">
                <div class="signup-content">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <h2 class="form-title">Daftar Akun</h2>
                        <div class="form-group">
                            <input type="name" name="name" class="form-input" id="name" placeholder="Masukkan nama lengkap"/>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" class="form-input" id="email" placeholder="Masukkan alamat email"/>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" class="form-input" id="password" placeholder="Password"/>
                            <span toggle="password" class="form-control"></span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                        </div>

                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-input"  id="re_password" placeholder="Ulangi password"/>
                        </div>

                        <div class="form-group">
                            <select name="level" class="form-control @error('level') is-invalid @enderror" id="exampleFormControlSelect" value="{{ old('level') }}" required autocomplete="level">
                                <option value="">Pilih Jenis Pengguna</option>
                                {{-- <option value="1">Admin</option> --}}
                                <option value="2">Desainer</option>
                                <option value="3">Konsumen</option>
                            </select>
                            @error('level')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                            <button type="submit" name="button" class="form-submit">Register</button>   
                            

                    </form>
                    <p class="loginhere">
                        Sudah memiliki akun ? <a href="{{ route('login') }}" class="loginhere-link">Login</a>
                    </p>
                </div>
            </div>
        </section>
    </div>
    </div>

    <!-- JS -->
    <script src="{{asset('template_1')}}/asset/register/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('template_1')}}/asset/register/js/main.js"></script>
</body>
</html>