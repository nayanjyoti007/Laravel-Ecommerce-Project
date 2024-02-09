@extends('frontend.main_master')
@section('content')
    <!-- @php
        $user = DB::table('users')
            ->where('id', Auth::user()->id)
            ->first();
    @endphp -->

    <div class="body-content">
        <div class="container">
            <div class="row">

                @include('frontend.userPanel.common.sidebar')

                <div class="col-md-2">

                </div> <!-- // end col md 2 -->


                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Change Password</span><strong> </strong> </h3>

                        <div class="card-body">



                            <form method="post" action="{{ route('user.profile.change-password') }}">
                                @csrf


                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Current Password <span>
                                        </span></label>
                                    <input type="password" id="current_password" name="current_password"
                                        class="form-control">

                                    @if ($errors->has('current_password'))
                                        <div class="text-danger">{{ $errors->first('current_password') }}</div>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">New Password <span> </span></label>
                                <input type="password" id="new_password" name="new_password" class="form-control">

                                @if ($errors->has('new_password'))
                                        <div class="text-danger">{{ $errors->first('new_password') }}</div>
                                    @enderror
                            </div>


                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Confirm Password <span>
                                    </span></label>
                                <input type="password" id="confirm_password" name="confirm_password"
                                    class="form-control">

                                    @if ($errors->has('confirm_password'))
                                        <div class="text-danger">{{ $errors->first('confirm_password') }}</div>
                                    @enderror
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
