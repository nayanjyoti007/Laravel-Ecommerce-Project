@extends('frontend.main_master')
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{url('/')}}">Home</a></li>
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
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Sign in</h4>
	<p class="">Hello, Welcome to your account.</p>
	{{-- <div class="social-sign-in outer-top-xs">
		<a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
		<a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
	</div> --}}
    <form id="loginformAuthentication" class="mb-3" action="{{route('user.login.submit')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Mobile</label>
            <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Enter your mobile" value="{{old('mobile')}}" autofocus />

            @if($errors->has('mobile'))
            <div class="text-danger">{{ $errors->first('mobile') }}</div>
            @enderror
        </div><br>
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
        </div><br>

        <!-- <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
                <label class="form-label">Password</label>
            </div>
            <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
        </div> -->


        <button class="btn-upper btn btn-primary checkout-page-button" type="submit" id="loginbtn" name="loginbtn">Sign in</button>
    </form>
</div>
<!-- Sign-in -->

<!-- create a new account -->

<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
@endsection
