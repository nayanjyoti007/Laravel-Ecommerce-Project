@extends('admin.layout.master')
@section('title', 'Admin | Ecommerce Project')
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
                            Change Password Form
                        </h5>
                        <div class="card-body">
                            <form action="{{ route('admin.changePasswordSubmit') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">


                                    @if (Auth::user()->can('change.form.two'))
                                        <div class="mb-3">
                                            <div class="form-password-toggle">
                                                <div class="d-flex justify-content-between">
                                                    <label class="form-label">Enter Manage Name:</label>
                                                </div>
                                                <div class="input-group input-group-merge">
                                                    <input type="text" id="manager_name" class="form-control"
                                                        name="manager_name" placeholder="Manager Name" />

                                                </div>
                                            </div>
                                            @if ($errors->has('manager_name'))
                                                <small class="text-danger"> {{ $errors->first('manager_name') }}</small>
                                            @endif
                                        </div>
                                    @endif



                                    <div class="mb-3">
                                        <div class="form-password-toggle">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-label">Current Password:</label>
                                            </div>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="current_password" class="form-control"
                                                    name="current_password" placeholder="Current Password" />
                                                <span class="input-group-text cursor-pointer"><i
                                                        class="bx bx-hide"></i></span>
                                            </div>
                                        </div>
                                        @if ($errors->has('current_password'))
                                            <small class="text-danger"> {{ $errors->first('current_password') }}</small>
                                        @endif
                                    </div>



                                    <div class="mb-3">
                                        <div class="form-password-toggle">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-label">New Password:</label>
                                            </div>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="new_password" class="form-control"
                                                    name="new_password" placeholder="New Password" />
                                                <span class="input-group-text cursor-pointer"><i
                                                        class="bx bx-hide"></i></span>
                                            </div>
                                        </div>
                                        @if ($errors->has('new_password'))
                                            <small class="text-danger"> {{ $errors->first('new_password') }}</small>
                                        @endif
                                    </div>



                                    <div class="mb-3">
                                        <div class="form-password-toggle">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-label">Re Enter Password:</label>
                                            </div>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="confirm_password" class="form-control"
                                                    name="confirm_password" placeholder="Re Enter New Password" />
                                                <span class="input-group-text cursor-pointer"><i
                                                        class="bx bx-hide"></i></span>
                                            </div>
                                        </div>
                                        @if ($errors->has('confirm_password'))
                                            <small class="text-danger"> {{ $errors->first('confirm_password') }}</small>
                                        @endif
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
