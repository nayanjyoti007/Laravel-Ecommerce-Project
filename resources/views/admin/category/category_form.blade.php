@extends('admin.layout.master')
@section('title', 'Admin | Category')
@section('categorymenu', 'active')
@section('headerTitle', 'Category')
@section('catrgoryOpen', 'open')
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
                                Update Category
                            @else
                                Add Category
                            @endif



                        </h5>
                        <div class="card-body">
                            <form action="{{ route('admin.category.submit') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="id" value="{{ isset($data) ? $data->id : '' }}">


                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Category Name English </label>
                                        <input type="text" class="form-control" maxlength="120" id="category_name_en"
                                            name="category_name_en"
                                            value="{{ isset($data) ? $data->category_name_en : old('category_name_en') }}">
                                        @if ($errors->has('category_name_en'))
                                            <small class="text-danger"> {{ $errors->first('category_name_en') }}</small>
                                        @endif
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Category Name Hindi </label>
                                        <input type="text" class="form-control" maxlength="120" id="category_name_hin"
                                            name="category_name_hin"
                                            value="{{ isset($data) ? $data->category_name_hin : old('category_name_hin') }}">
                                        @if ($errors->has('category_name_hin'))
                                            <small class="text-danger"> {{ $errors->first('category_name_hin') }}</small>
                                        @endif
                                    </div>


                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Category Icone </label>
                                        <input type="text" class="form-control" maxlength="120" id="category_icon"
                                            name="category_icon"
                                            value="{{ isset($data) ? $data->category_icon : old('category_icon') }}">
                                        @if ($errors->has('category_icon'))
                                            <small class="text-danger"> {{ $errors->first('category_icon') }}</small>
                                        @endif
                                    </div>

                                </div>




                                <button type="submit" id="submit" name="submit" class="btn btn-primary btn-sm mt-3">
                                    Submit </button>

                                <a href="{{ route('admin.category.list') }}" class="btn btn-warning btn-sm mt-3">Back</a>
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
