<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <link href="images/favicon.png" rel="icon" />
    <title>Reset Password - Sistem Pencatatan Barang</title>
    <meta name="description" content="Reset Password - Sistem Pencatatan Barang">
    <meta name="author" content="Dian Febrianto">

    <!-- Web Fonts
========================= -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900'
        type='text/css'>

    <!-- Stylesheet
========================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css/stylesheet.css') }}" />
    <!-- Colors Css -->
    <link id="color-switcher" type="text/css" rel="stylesheet" href="#" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  </head>

<body>

    <!-- Preloader -->
    <div class="preloader">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- Preloader End -->

    
    <div id="main-wrapper" class="oxyy-login-register">
      <div class="container-fluid px-0">
        <div class="row g-0 min-vh-100"> 
          <!-- Welcome Text
          ========================= -->
          <div class="col-md-6">
            <div class="hero-wrap d-flex align-items-center h-100">
              <div class="hero-mask opacity-8 bg-primary"></div>
              <div class="hero-bg hero-bg-scroll" style="background-image:url('/assets/images/logo.svg');">
              </div>
              <div class="hero-content w-100 min-vh-100 d-flex flex-column">
                  <div class="row g-0">
                      <div class="col-11 col-sm-10 col-lg-9 mx-auto">
                          <div class="logo mt-5 mb-5 mb-md-0"> <a class="d-flex" href="/"
                                  title="Sistem Pencatatan Barang"><img src="{{ asset('assets/images/logo.svg') }}" style="width:100px;" alt="Sistem Pencatatan Barang"></a> </div>
                      </div>
                  </div>
                <div class="row g-0 my-auto">
                  <div class="col-11 col-sm-10 col-lg-9 mx-auto">
                    <h1 class="text-11 text-white mb-4">Don't worry,</h1>
                    <p class="text-4 text-white lh-base mb-5">We are here help you to recover your password.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Welcome Text End --> 
          
          <!-- Forgot Password Form
          ========================= -->
          <div class="col-md-6 d-flex">
            <div class="container my-auto py-5">
              <div class="row g-0">
                <div class="col-11 col-sm-10 col-lg-9 col-xl-8 mx-auto">
                  @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif
                  <h3 class="fw-600 mb-4">{{ __('Reset Password') }}</h3>
                  <p class="text-muted mb-4">Enter the email address associated with your account.</p>
                  <form id="forgotForm" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-3">
                      <label for="emailAddress" class="form-label">{{ __('Email Address') }}</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="d-grid my-4">
              <button class="btn btn-primary" type="submit">{{ __('Send Password Reset Link') }}</button>
            </div>
                  </form>
                 
                </div>
              </div>
            </div>
          </div>
          <!-- Forgot Password Form End --> 
        </div>
      </div>
    </div>
   
      <!-- Styles Switcher -->
    <div id="styles-switcher" class="left">
        <h5>Color Switcher</h5>
        <hr>
        <ul class="mb-0">
          <li class="blue" data-bs-toggle="tooltip" title="Blue" data-path="#"></li>
          <li class="purple" data-bs-toggle="tooltip" title="Purple" data-path="{{ asset('vendor/color/color-indigo.css') }}"></li>
          <li class="indigo" data-bs-toggle="tooltip" title="Indigo" data-path="{{ asset('vendor/color/color-purple.css') }}"></li>
          <li class="pink" data-bs-toggle="tooltip" title="Pink" data-path="{{ asset('vendor/color/color-pink.css') }}"></li>
          <li class="red" data-bs-toggle="tooltip" title="Red" data-path="{{ asset('vendor/color/color-red.css') }}"></li>
          
        </ul>
        <button class="btn switcher-toggle"><i class="fas fa-cog"></i></button>
    </div>
    <!-- Styles Switcher End -->

    <!-- Script -->
    <script src="{{ asset('vendor/js/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Style Switcher -->
    <script src="{{ asset('vendor/js/switcher.min.js') }}"></script>
    <script src="{{ asset('vendor/js/theme.js') }}"></script>
</body>

</html>
