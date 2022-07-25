<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset ('template_1') }}/asset/login/fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{ asset ('template_1') }}/asset/login/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset ('template_1') }}/asset/login/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset ('template_1') }}/asset/login/css/style.css">

    <link rel="icon" href="{{ asset('title')}}/title.png" type="image/title-icon">
    <title>Reset Password | Artech</title>
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 contents">
              <div class="col-md-12">
                <div class="form-block">
                    <div class="mb-4">
                    <h3>Reset Password</h3>
                  </div>
  
                  <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    
                    <input type="hidden" name="token" value="{{ $token }}">
  
                    <div class="form-group">
                      <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" required autocomplete="email"  id="email" placeholder="Email" autofocus>
                      @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                               @enderror
                    </div>
    
                    <div class="form-group">
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                       @enderror
                    </div>
  
                    <div class="form-group">
                      <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password Confirmation">
                    </div>
                      <button type="submit" class="btn btn-primary">
                          Reset Password
                      </button>  
                  </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    <script src="{{ asset ('template_1') }}/asset/login/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset ('template_1') }}/asset/login/js/popper.min.js"></script>
    <script src="{{ asset ('template_1') }}/asset/login/js/bootstrap.min.js"></script>
    <script src="{{ asset ('template_1') }}/asset/login/js/main.js"></script>
  </body>
</html>