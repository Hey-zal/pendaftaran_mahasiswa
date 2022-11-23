


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
        <meta name="author" content="NobleUI">
        <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    
        <title>Register</title>
    
      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
      <!-- End fonts -->
    
        <!-- core:css -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css')}}">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="  {{ asset('assets/fonts/feather-font/css/iconfont.css')}} ">
        <link rel="stylesheet" href="  {{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}} ">
        <!-- endinject -->
    
      <!-- Layout styles -->  
        <link rel="stylesheet" href="  {{ asset('assets/css/demo1/style.css')}}">
      <!-- End layout styles -->
    
      <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png')}} " />
    </head>
    <body>
        <div class="main-wrapper">
            <div class="page-wrapper full-page">
                <div class="page-content d-flex align-items-center justify-content-center">
    
                    <div class="row w-100 mx-0 auth-page">
                        <div class="col-md-8 col-xl-6 mx-auto">
                            <div class="card">
                                <div class="row">
                    <div class="col-md-4 pe-md-0">
                      <div class="auth-side-wrapper">
                        <img src="{{ asset('assets/images/admin.png')}}" />
    
                      </div>
                    </div>
                    <div class="col-md-8 ps-md-0">
                      <div class="auth-form-wrapper px-4 py-5">
                        <a href="#" class="noble-ui-logo d-block mb-2">REGISTER<span></span></a>
                        <h5 class="text-muted fw-normal mb-4"></h5>
                        <form class="forms-sample"method="POST" action="{{ route('register') }}">
                            @csrf
                          <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Username</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="userEmail" class="form-label">Email address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                          </div>
                          <div class="mb-3">
                            <label for="userPassword" class="form-label">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
    
                          <label for="userPassword" class="form-label">Confirm Password</label>
                          <div class="mb-3">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
    
                        <input hidden id="roles" type="text" class="form-control" name="roles" value="user">

                          <div>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>                        
                          </div>
                         
                        </form>
                      </div>
                    </div>
                  </div>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    
        <!-- core:js -->
        <script src="  {{ asset('assets/vendors/core/core.js')}}"></script>
        <!-- endinject -->
    
        <!-- Plugin js for this page -->
        <!-- End plugin js for this page -->
    
        <!-- inject:js -->
        <script src="{{ asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
        <script src="{{asset('assets/js/template.js')}}"></script>
        <!-- endinject -->
    
        <!-- Custom js for this page -->
        <!-- End custom js for this page -->
    
    </body>
    </html>