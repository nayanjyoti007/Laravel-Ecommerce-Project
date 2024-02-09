@extends('frontend.main_master')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-3"></div>
                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle">Create a new account</h4>
                        <p class="text title-tag-line">Hello, Welcome to Ecommerce Project.</p>

                        <form id="registerFrom">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullname" name="fullname"
                                    placeholder="Enter your full name" value="{{ old('fullname') }}" autofocus />
                                <div class="text-danger" id="fullname_error"></div>
                            </div><br>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" value="{{ old('email') }}" autofocus />
                                <div class="text-danger" id="email_error"></div>
                            </div><br>
                            <div class="mb-3">
                                <label class="form-label">Mobile</label>
                                <input type="number" class="form-control" id="mobile" name="mobile"
                                    placeholder="Enter your mobile" value="{{ old('mobile') }}" autofocus />
                                <div class="text-danger" id="mobile_error"></div>
                            </div><br>

                            <div>
                                <div class="form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">Password</label>
                                    </div>

                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="Enter your password" />


                                </div>
                                <div class="text-danger" id="password_error"></div>
                            </div><br>


                            <button class="btn-upper btn btn-primary checkout-page-button" type="submit" id="registerbtn"
                            name="registerbtn">Register Here</button>
                        </form>


                    </div>
                    <!-- Sign-in -->

                    <!-- create a new account -->

                    <!-- create a new account -->
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('frontend.body.brands')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection

@section('scripts')
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
@endsection
