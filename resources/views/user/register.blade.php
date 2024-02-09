<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Student Register || Ecommerce Project</title>

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
                <!-- Register -->

                <div class="msg">
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                </div>

                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <h5 class="mb-3 text-center logo_head">Ecommerce Project </h5>
                        {{-- Corporation Ltd --}}

                        <div class="app-brand justify-content-center">

                            {{-- <img src="{{ asset('backend_assets/logo/logo.png') }}" alt="" class="logo_img"
                                style="width: 100%;"> --}}

                        </div><br>
                        <!-- /Logo -->

                        <form id="registerFrom">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullname" name="fullname"
                                    placeholder="Enter your full name" value="{{ old('fullname') }}" autofocus />
                                <div class="text-danger" id="fullname_error"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" value="{{ old('email') }}" autofocus />
                                <div class="text-danger" id="email_error"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mobile</label>
                                <input type="number" class="form-control" id="mobile" name="mobile"
                                    placeholder="Enter your mobile" value="{{ old('mobile') }}" autofocus />
                                <div class="text-danger" id="mobile_error"></div>
                            </div>

                            <div>
                                <div class="form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Password</label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="Enter your password" />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                                <div class="text-danger" id="password_error"></div>
                            </div>
                            <div class="my-3">
                                {{-- <input value="Register Here"> --}}

                                <button class="btn btn-primary-ssn w-100" type="submit" id="registerbtn"
                                    name="registerbtn">Register Here</button>
                            </div>
                        </form>


                        <p class="text-center">
                            <span>Already have an account </span>
                            <a href="{{route('user.login')}}">
                                <span>Login here</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->
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
    <script>

        $("#registerFrom").submit(function (e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: "{{ route('user.register.submit') }}",
                type: "POST",
                data: formData,
                beforeSend: function () {
                    $("#registerbtn").text("Please Wait ...");
                    $('#registerbtn').attr('disabled', true);
                },
                error: function (xhr) {
                    console.log(xhr);
                    $("[id$='_error']").html('');
                    $("#registerbtn").text("Register Here");
                    $('#registerbtn').attr('disabled', false);
                    $.each(xhr.responseJSON.errors, function (key, value) {
                        $('#' + key + '_error').html('<span style="color:red">' + value +
                            '</span');
                    });
                    $("#registerbtn").text("Register Here");
                    $('#registerbtn').attr('disabled', false);
                },
                success: function (data) {
                    console.log(data);
                    $("#registerbtn").text("Register Here");
                    $('#registerbtn').attr('disabled', false);
                    if (data.status == 200) {

                        swal(data.message, "", "success");
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    } else {
                        alert('Something went wrong');
                    }
                }
            });
        });
    </script>

</body>

</html>
