<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Student Login || Ecommerce Project</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <!-- <link rel="icon" type="image/x-icon" href="{{ asset('backend_assets/img/favicon/favicon.ico') }}" /> -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('backend_assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('backend_assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('backend_assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('backend_assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('backend_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('backend_assets/vendor/css/pages/page-auth.css') }}" />
    <!-- Helpers -->
    <script src="{{ asset('backend_assets/vendor/js/helpers.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('js/config.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('backend_assets/css/new.css') }}">
</head>

<body class="bg-ssn-primary">
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Login -->

                <div class="msg">
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                </div>

                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <h5 class="mb-2 text-center logo_head">Ecommerce Project </h5>
                        {{-- Corporation Ltd --}}

                        <div class="app-brand justify-content-center">

                            {{-- <img src="{{ asset('backend_assets/logo/logo.png') }}" alt="" class="logo_img" style="width: 100%;"> --}}

                        </div><br>
                        <!-- /Logo -->

                        <form id="loginformAuthentication" class="mb-3" action="{{route('user.login.submit')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Mobile</label>
                                <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Enter your mobile" value="{{old('mobile')}}" autofocus />

                                @if($errors->has('mobile'))
                                <div class="text-danger">{{ $errors->first('mobile') }}</div>
                                @enderror
                            </div>
                            {{-- <div class="mb-3">
                                <label class="form-label">Select Role </label>
                                <select class="form-select" id="role" name="role">
                                    <option selected disabled>Select Role</option>
                                    <option value="0">Admin</option>
                                    <option value="1">User</option>
                                </select>
                                @if($errors->has('role'))
                                <div class="text-danger">{{ $errors->first('role') }}</div>
                                @enderror
                            </div> --}}

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your Password" autofocus />
                                @if($errors->has('password'))
                                <div class="text-danger">{{ $errors->first('password') }}</div>
                                @enderror
                            </div>

                            <!-- <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label">Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div> -->

                            <div class="mb-3">
                                <input value="Sign in" class="btn btn-primary-ssn w-100" type="submit" id="loginbtn" name="loginbtn">
                            </div>
                        </form>

                        <p class="text-center">
                            <span>New on our platform? </span>
                            <a href="{{route('user.register')}}">
                                <span>Register here</span>
                            </a>
                        </p>

                        <!-- <p class="text-center">
              <span>New on our platform?</span>
              <a href="auth-Login-basic.html">
                <span>Create an account</span>
              </a>
            </p> -->
                    </div>
                </div>
                <!-- /Login -->
            </div>
        </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('backend_assets/js/function.js') }}"></script>
    <script src="{{ asset('backend_assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('backend_assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('backend_assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('backend_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('backend_assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('backend_assets/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <!-- Page JS -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>
