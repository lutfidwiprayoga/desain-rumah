<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="asset/login/fonts/icomoon/style.css">

    <link rel="stylesheet" href="asset/login/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/login/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="asset/login/css/style.css">

    <title>Login | Artech</title>
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 contents">
            <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="form-block">
                    <div class="mb-4">
                    <h3>Explore <strong>Artech</strong></h3>
                  </div>
  
                  <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    
                    <input type="hidden" name="token" value="{{ $token }}">
  
                    <div class="form-group first">
                      <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" required autocomplete="email"  id="email" placeholder="Email" autofocus>
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
  
                    <div class="form-group last mb-4">
                      <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password Confirmation">
                  
                      <button type="submit" class="btn btn-primary">
                          Reset Password
                      </button>  
                  </form>
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