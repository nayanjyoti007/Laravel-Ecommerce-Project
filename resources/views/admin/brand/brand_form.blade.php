@extends('admin.layout.master')
@section('title', 'Admin | Brand')
@section('brandmenu', 'active')
@section('headerTitle', 'Brand')
@section('brandOpen', 'open')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row justify-content-center">
                <div class="col-md-6">

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
                                Update Brand
                            @else
                                Add Brand
                            @endif



                        </h5>
                        <div class="card-body">
                            <form action="{{ route('admin.brand.submit') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="id" value="{{ isset($data) ? $data->id : '' }}">


                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Brand Name English </label>
                                        <input type="text" class="form-control" maxlength="120" id="brnad_name_en"
                                            name="brnad_name_en"
                                            value="{{ isset($data) ? $data->brnad_name_en : old('brnad_name_en') }}">
                                        @if ($errors->has('brnad_name_en'))
                                            <small class="text-danger"> {{ $errors->first('brnad_name_en') }}</small>
                                        @endif
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Brand Name Hindi </label>
                                        <input type="text" class="form-control" maxlength="120" id="brnad_name_hin"
                                            name="brnad_name_hin"
                                            value="{{ isset($data) ? $data->brnad_name_hin : old('brnad_name_hin') }}">
                                        @if ($errors->has('brnad_name_hin'))
                                            <small class="text-danger"> {{ $errors->first('brnad_name_hin') }}</small>
                                        @endif
                                    </div>



                                    <div class="mb-3 col-md-7">
                                        <label class="form-label">Image : </label>
                                        <input type="file" name="image" id="image" class="form-control">
                                        @if ($errors->has('image'))
                                            <small class="text-danger"> {{ $errors->first('image') }}</small>
                                        @endif
                                    </div>

                                    <div class="mb-3 col-md-3">
                                        <img src="{{ isset($data) ? asset('backend_images/upload/brand/' . $data->brnad_image) : '' }}"
                                            alt="" width="100px" id="viewImage">
                                    </div>


                                </div>




                                <button type="submit" id="submit" name="submit" class="btn btn-primary btn-sm mt-3">
                                    Submit </button>

                                <a href="{{ route('admin.brand.list') }}" class="btn btn-warning btn-sm mt-3">Back</a>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- / Content -->

    @endsection

    @section('script')
        {{-- <script src="{{ asset('backend_assets/ckeditor4/ckeditor.js') }}"></script> --}}


        <script>
            $(document).ready(function() {
                $("#image").change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $("#viewImage").attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>
    @endsection
