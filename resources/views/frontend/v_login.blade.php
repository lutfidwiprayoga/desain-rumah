<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('template_1')}}/asset/login/fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{asset('template_1')}}/asset/login/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('template_1')}}/asset/login/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('template_1')}}/asset/login/css/style.css">

    <link rel="icon" href="{{ asset('title')}}/title.png" type="image/title-icon">
    <title>Login | Artech</title>
  </head>
  <body>
  <div class="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-block">
                  <div class="mb-4">
                  <h3>Explore <strong>Griya Artech</strong></h3>
                </div>

                <form method="POST" action="{{ route('login') }}">
                  @csrf

                  <div class="form-group first">
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email"  id="email" placeholder="Email">
                    @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                  </div>
  
                  <div class="form-group last mb-4">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                  </div>

                  <div class="d-flex mb-5 align-items-center">
                    <span class="ml-auto"><a href="{{ route('password.request')}}" class="forgot-pass">Lupa Password</a></span> 
                  </div>
                  <input type="submit" value="Login" class="btn btn-pill text-white btn-block btn-primary">
                  <span class="d-block text-center my-4"><a href="{{ route('register') }}" class="register-account">Daftar</span>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <script src="asset/login/js/jquery-3.3.1.min.js"></script>
    <script src="asset/login/js/popper.min.js"></script>
    <script src="asset/login/js/bootstrap.min.js"></script>
    <script src="asset/login/js/main.js"></script>
  </body>
</html>