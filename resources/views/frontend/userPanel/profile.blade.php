@extends('frontend.main_master')
@section('content')

<div class="body-content">
	<div class="container">
		<div class="row">

			 @include('frontend.userPanel.common.sidebar')

			<div class="col-md-2">

			</div> <!-- // end col md 2 -->


			<div class="col-md-6">
                <div class="card" style="margin-top: 25px;">
                    <h4 class="text-center"><span class="text-danger">Hi....</span><strong>{{ Auth::user()->fullname }}</strong> Welcome To Easy Online Shop </h4>


  	<div class="card-body">



  		<form method="post" action="{{route('user.profile.update')}}" enctype="multipart/form-data" style="margin-top: 35px;">
  			@csrf

            <input type="hidden" name="id" id="id" value="{{Auth::user()->id}}">
         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Name <span> </span></label>
            <input type="text" name="name" class="form-control" value="{{ $user->fullname }}">
        </div>

        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Email <span> </span></label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
        </div>


        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Phone <span> </span></label>
            <input type="text" name="mobile" class="form-control" value="{{ $user->mobile }}">
        </div>

         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">User Image <span> </span></label>
            <input type="file" name="profile" class="form-control">
        </div>

         <div class="form-group">
           <button type="submit" class="btn btn-danger">Update</button>
        </div>



  		</form>
  	</div>



  </div>

			</div> <!-- // end col md 6 -->

		</div> <!-- // end row -->

	</div>

</div>


@endsection
