@extends('admin.layout.master')
@section('title', 'Admin | Ecommerce Project | Create Admin')
@section('createadmin', 'active')
@section('open', 'open')
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
                                Create Admin
                            @else
                                Create Admin
                            @endif



                        </h5>
                        <div class="card-body">
                            <form action="{{ route('admin.crateadmin.submit') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="id" value="{{ isset($data) ? $data->id : '' }}">


                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Name </label>
                                        <input type="text" class="form-control" maxlength="120" id="name"
                                            name="name" value="{{ isset($data) ? $data->name : old('name') }}">
                                        @if ($errors->has('name'))
                                            <small class="text-danger"> {{ $errors->first('name') }}</small>
                                        @endif
                                    </div>


                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Email </label>
                                        <input type="email" class="form-control" maxlength="120" id="email"
                                            name="email" value="{{ isset($data) ? $data->email : old('email') }}">
                                        @if ($errors->has('email'))
                                            <small class="text-danger"> {{ $errors->first('email') }}</small>
                                        @endif
                                    </div>



                                    @if (isset($data) && !empty($data))
                                    @else
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Password </label>
                                            <input type="text" class="form-control" maxlength="120" id="password"
                                                name="password"
                                                value="{{ isset($data) ? $data->password : old('password') }}">
                                            @if ($errors->has('password'))
                                                <small class="text-danger"> {{ $errors->first('password') }}</small>
                                            @endif
                                        </div>
                                    @endif




                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Select Roles </label>
                                        <select name="roles" class="form-control">
                                            <option selected disabled>Select Roles</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}"
                                                    {{ isset($data) && $data->hasRole($role->name) ? 'selected' : '' }}>
                                                    {{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('roles'))
                                            <span style="color: red">{{ $errors->first('roles') }}</span>
                                        @enderror
                                </div>














                            </div>




                            <button type="submit" id="submit" name="submit" class="btn btn-primary btn-sm mt-3">
                                Submit </button>

                            <a href="{{ route('admin.crateadmin.list') }}" class="btn btn-warning btn-sm mt-3">Back</a>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- / Content -->

@endsection

@section('script')
    <script src="{{ asset('backend_assets/ckeditor4/ckeditor.js') }}"></script>


    <script>
        $(document).ready(function() {
            CKEDITOR.replace('description', {
                height: 150,
            });

            CKEDITOR.replace('main_description', {
                height: 250,
            });

            // For Slug
            $('#title').keyup(function() {
                var title = $(this).val();
                // alert(title);
                var slug = $('#slug');
                // alert(slug);
                if (title.length > 0) {
                    $.get("{{ url('/admin/generate-slug') }}", {
                        data: title,
                    }).done(function(data) {
                        slug.val(data);
                    });
                } else {
                    slug.val("");
                }
            });

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
