<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="{{ asset('title')}}/title.png" type="image/title-icon">
<title>Forgot Password | Artech</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<style>
        body {
        background-color: white;
        font-family: Nunito Arial, Helvetica, sans-serif;
        }

        .btn {
        background-color: #e7ab3c;
        width: 100%;
        color: #fff;
        padding: 10px;
        font-size: 18px;
        border-radius: 10px;
        }

        .btn:hover {
        background-color: black;
        color: white;
        }

        input {
        height: 50px !important;
        }

        .form-control:focus {
        border-color: black;
        box-shadow: none;
        border-radius: 10px;
        }

        h3 {
        color: black;
        font-size: 36px;
        }

        .cw {
        width: 35%;
        }

        @media(max-width: 992px) {
        .cw {
        width: 60%;
        }    
        }

        @media(max-width: 768px) {
        .cw {
        width: 80%;
        }
        }

        @media(max-width: 492px) {
        .cw {
        width: 90%;
        }
        }

    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="bg-white text-center p-5 mt-3 center">
        <h3>Lupa Password </h3>
            <p>Masukkan Email valid Anda</p>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
    <form class="pb-3" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group">
        <input type="email" name="email" 
        class="form-control @error('email') is-invalid @enderror form-control-user" value="{{ old('email') }}" 
        placeholder="Email" required>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <button type="submit" class="btn">Reset Password</button>
    </form>    
    </div>
</div>
</body>
</html>