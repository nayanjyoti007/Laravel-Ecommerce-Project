@extends('admin.layout.master')
@section('title', 'Admin | Ecommerce Project')
@section('gallery', 'active')
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

                            @if(isset($data) && !empty($data))
                        Update Gallery Image
                    @else
                        Add Gallery Image
                    @endif



                        </h5>
                        <div class="card-body">
                            <form action="{{ route('admin.gallery.submit') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="id" value="{{isset($data) ? $data->id : ''}}">
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Image: </label>
                                        <input type="file" class="form-control" id="image" name="image"
                                            value="{{isset($data) ? $data->image : old('image')}}">
                                        @if ($errors->has('image'))
                                            <small class="text-danger"> {{ $errors->first('image') }}</small>
                                        @endif
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <img src="{{ isset($data) ? asset('backend_images/' . $data->image) : '' }}" alt="" width="100px" id="viewImage">
                                    </div>

                                </div>


                                <button type="submit" id="submit" name="submit" class="btn btn-primary btn-sm mt-3">
                                    Submit </button>

                                        <a href="{{route('admin.gallery.list')}}" class="btn btn-warning btn-sm mt-3">Back</a>
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



