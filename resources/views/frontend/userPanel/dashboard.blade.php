@extends('frontend.main_master')
@section('content')

<div class="body-content">
	<div class="container">
		<div class="row">


            @include('frontend.userPanel.common.sidebar')

 <!-- // end col md 2 -->



			<div class="col-md-2">

			</div> <!-- // end col md 2 -->


			<div class="col-md-6">
  <div class="card" style="margin-top: 25px;">
  	<h4 class="text-center"><span class="text-danger">Hi....</span><strong>{{ Auth::user()->fullname }}</strong> Welcome To Easy Online Shop </h4>

  </div>



			</div> <!-- // end col md 6 -->

		</div> <!-- // end row -->

	</div>

</div>


@endsection
