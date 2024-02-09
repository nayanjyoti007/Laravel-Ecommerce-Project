@extends('admin.layout.master')
@section('title', 'Admin Profile')
@section('profile', 'active')
@section('headerTitle', 'Admin Profile')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row justify-content-center">
                <div class="col-md-7">

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


                    <div class="card">
                        <h5 class="card-header">
                            Admin Profile Update
                        </h5>

                        <div class="col-lg-4 col-md-3">
                            <div>
                                <!-- Modal -->
                                <div class="modal fade" id="changePassword" data-bs-backdrop="static" tabindex="-1">
                                    <div class="modal-dialog">
                                        <form class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="changePasswordTitle">Change Password</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body" id="modal-body-content">

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="card-body">
                            <form action="{{ route('admin.profile.submit') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="id" value="{{ isset($data) ? $data->id : '' }}">

                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Full Name: </label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Enter Full Name" required="" value="{{ $data->name }}">
                                            @if ($errors->has('name'))
                                                <small class="text-danger"> {{ $errors->first('name') }}</small>
                                            @endif
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Email: </label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="Enter Email" value="{{ $data->email }}">
                                            @if ($errors->has('email'))
                                                <small class="text-danger"> {{ $errors->first('email') }}</small>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="row">

{{--
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Mobile : </label>
                                            <input type="number" name="mobile" id="mobile" class="form-control"
                                                placeholder="Enter Mobile" required="" value="{{ $data->mobile }}">
                                            @if ($errors->has('mobile'))
                                                <small class="text-danger"> {{ $errors->first('mobile') }}</small>
                                            @endif
                                        </div> --}}
                                    </div>


                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Profile Image : </label>
                                            <input type="file" name="profile" id="profile" class="form-control">
                                            @if ($errors->has('profile'))
                                                <small class="text-danger"> {{ $errors->first('profile') }}</small>
                                            @endif
                                        </div>

                                        <div class="mb-3 col-md-5">
                                            <img src="{{ isset($data->profile) ? asset('backend_images/' . $data->profile) : asset('admin-man.png') }}" alt="" width="100px" id="viewImage" class="">

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <button type="submit" id="submit" name="submit"
                                            class="btn btn-primary btn-sm mt-3">
                                            Update Profile </button>
                                                                               </div>
                                    </div>

                                </div>



                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- / Content -->
    @endsection


    @section('script')
    <script>
        $(document).ready(function() {

            $("#profile").change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#viewImage").attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    @endsection
