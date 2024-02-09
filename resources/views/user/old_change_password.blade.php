@extends('user.layout.master')
@section('title', 'User Change Password | Ecommerce Project')
@section('changepassword', 'active')
@section('headerTitle', 'Change Password')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row justify-content-center">
                <div class="col-md-5">

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif


                    <div class="card mb-4">
                        <h5 class="card-header">

                            @if (isset($data) && !empty($data))
                                Update Change Password
                            @else
                                Add Change Password
                            @endif



                        </h5>
                        <div class="card-body">
                            <form action="{{ route('admin.changePasswordSubmit') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="id" value="{{ isset($data) ? $data->id : '' }}">
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Current Password: </label>
                                        <input type="password" name="current_password" id="swidth" class="form-control"
                                            placeholder="Current Password" required="">
                                            @if ($errors->has('current_password'))
                                            <small class="text-danger"> {{ $errors->first('current_password') }}</small>
                                        @endif
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label class="form-label">New Password: </label>
                                    <input type="password" name="new_password"  id="sheigth" class="form-control" placeholder="New Password" required="">
                                    @if ($errors->has('new_password'))
                                    <small class="text-danger"> {{ $errors->first('new_password') }}</small>
                                @endif
                            </div>

                            <div class="mb-3 col-md-12">
                                <label class="form-label">Re Enter Password: </label>
                                <input type="password" name="confirm_password"  id="sheigth" class="form-control" placeholder="Re Enter New Password" required="">
                                @if ($errors->has('confirm_password'))
                                <small class="text-danger"> {{ $errors->first('confirm_password') }}</small>
                            @endif
                        </div>

                                <div class="mb-3 col-md-12">
                                    <img src="{{ isset($data) ? asset('backend_images/' . $data->image) : '' }}"
                                        alt="" width="100px" id="viewImage">
                                </div>

                            </div>


                            <button type="submit" id="submit" name="submit" class="btn btn-primary btn-sm mt-3">
                                Submit </button>


                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- / Content -->

@endsection
