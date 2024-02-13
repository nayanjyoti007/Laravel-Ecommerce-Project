@extends('admin.layout.master')
@section('title', 'Admin | Add Product')
@section('addproductmenu', 'active')
@section('headerTitle', 'Add Product')
@section('productOpen', 'open')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row justify-content-center">
                <div class="col-md-12">

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
                                Update Product
                            @else
                                Add Product
                            @endif



                        </h5>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <input type="hidden" name="id" value="{{ isset($data) ? $data->id : '' }}">


                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Product Name English: </label>
                                            <input type="text" name="product_name_en" id="product_name_en"
                                                class="form-control" placeholder="Product Name English" required=""
                                                value="">
                                            @if ($errors->has('product_name_en'))
                                                <small class="text-danger"> {{ $errors->first('product_name_en') }}</small>
                                            @endif
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Product Name Hindi: </label>
                                            <input type="text" name="product_name_hin" id="product_name_hin"
                                                class="form-control" placeholder="Product Name English" required=""
                                                value="">
                                            @if ($errors->has('product_name_hin'))
                                                <small class="text-danger"> {{ $errors->first('product_name_hin') }}</small>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="row mt-3">

                                        <div class="mb-3 col-md-3">
                                            <label class="form-label">Select Brand </label>
                                            <select name="brand_id" id="brand_id" class="form-control">
                                                <option selected disabled>Select Brand</option>
                                                @foreach ($brands as $bnd)
                                                    <option value="{{ $bnd->id }}"
                                                        {{ old('brand_id') == $bnd->id ? 'selected' : '' }}>
                                                        {{ $bnd->brnad_name_en }}</option>
                                                @endforeach

                                            </select>
                                            @if ($errors->has('brand_id'))
                                                <small class="text-danger">{{ $errors->first('brand_id') }}</small>
                                            @enderror
                                    </div>


                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">Select Category </label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option selected disabled>Select Category</option>
                                            @foreach ($categorys as $cat)
                                                <option value="{{ $cat->id }}"
                                                    {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                                    {{ $cat->category_name_en }}</option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('category_id'))
                                            <small class="text-danger">{{ $errors->first('category_id') }}</small>
                                        @enderror
                                </div>


                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Sub Category </label>
                                    <select name="sub_category" id="sub_category" class="form-control">
                                        <option selected disabled>Select Sub Category</option>

                                        @if (isset($data))
                                            @php
                                                $subcategorys = App\Models\SubCategory::where('category_id', $data->category_id)->get();
                                            @endphp

                                            @foreach ($subcategorys as $sub_cat)
                                                <option value="{{ $sub_cat->id }}"
                                                    {{ old('sub_category') == $sub_cat->id ? 'selected' : '' }}
                                                    {{ isset($data) ? ($data->sub_category_id == $sub_cat->id ? 'selected' : '') : '' }}>
                                                    {{ $sub_cat->sub_category_name_en }}</option>
                                            @endforeach
                                        @endif


                                    </select>
                                    @if ($errors->has('sub_category'))
                                        <small class="text-danger">{{ $errors->first('sub_category') }}</small>
                                    @enderror
                            </div>


                            <div class="mb-3 col-md-3">
                                <label class="form-label">Sub Sub Category </label>
                                <select name="sub_sub_category" id="sub_sub_category" class="form-control">
                                    <option selected disabled>Select Sub Sub Category</option>

                                    @if (isset($data))
                                        @php
                                            $subcategorys = App\Models\SubCategory::where('category_id', $data->category_id)->get();
                                        @endphp

                                        @foreach ($subcategorys as $sub_cat)
                                            <option value="{{ $sub_cat->id }}"
                                                {{ old('sub_sub_category') == $sub_cat->id ? 'selected' : '' }}
                                                {{ isset($data) ? ($data->sub_sub_category_id == $sub_cat->id ? 'selected' : '') : '' }}>
                                                {{ $sub_cat->sub_sub_category_name_en }}</option>
                                        @endforeach
                                    @endif


                                </select>
                                @if ($errors->has('sub_sub_category'))
                                    <small class="text-danger">{{ $errors->first('sub_sub_category') }}</small>
                                @enderror
                        </div>


                    </div>

                    <div class="row mt-3">

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Product Tags English: </label>
                            <input type="text" name="product_tags_en" id="product_tags_en"
                                class="form-control" placeholder="Product Tags English" value=""
                                multiple>
                            @if ($errors->has('product_tags_en'))
                                <small class="text-danger">
                                    {{ $errors->first('product_tags_en') }}</small>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Product Tags Hindi: </label>
                            <input type="text" name="product_tags_hin" id="product_tags_hin"
                                class="form-control" placeholder="Product Tags Hindi" value=""
                                multiple>
                            @if ($errors->has('product_tags_hin'))
                                <small class="text-danger">
                                    {{ $errors->first('product_tags_hin') }}</small>
                            @endif
                        </div>

                    </div>

                    <div class="row mt-3">
                        <div class="mb-3 col-md-3">
                            <label class="form-label">Product Size English: </label>
                            <input type="text" name="product_size_en" id="product_size_en"
                                class="form-control" placeholder="Product Tags English"
                                value="Small, Medium, Large" multiple>
                            @if ($errors->has('product_size_en'))
                                <small class="text-danger">
                                    {{ $errors->first('product_size_en') }}</small>
                            @endif
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label">Product Size Hindi: </label>
                            <input type="text" name="product_size_hin" id="product_size_hin"
                                class="form-control" placeholder="Product Tags Hindi"
                                value="छोटा, मध्यम, बड़ा," multiple>
                            @if ($errors->has('product_size_hin'))
                                <small class="text-danger">
                                    {{ $errors->first('product_size_hin') }}</small>
                            @endif
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">Product Color English: </label>
                            <input type="text" name="product_color_en" id="product_color_en"
                                class="form-control" placeholder="Product Color English"
                                value="Red, Blue, Black" multiple>
                            @if ($errors->has('product_color_en'))
                                <small class="text-danger">
                                    {{ $errors->first('product_color_en') }}</small>
                            @endif
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label">Product Color Hindi: </label>
                            <input type="text" name="product_color_hin" id="product_color_hin"
                                class="form-control" placeholder="Product Color Hindi"
                                value="लाल, नीला, काला" multiple>
                            @if ($errors->has('product_color_hin'))
                                <small class="text-danger">
                                    {{ $errors->first('product_color_hin') }}</small>
                            @endif
                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="mb-3 col-md-3">
                            <label class="form-label">Product Code: </label>
                            <input type="text" name="product_code" id="product_code"
                                class="form-control" placeholder="Product Code" required=""
                                value="">
                            @if ($errors->has('product_code'))
                                <small class="text-danger"> {{ $errors->first('product_code') }}</small>
                            @endif
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">Product QTY: </label>
                            <input type="number" name="product_qty" id="product_qty"
                                class="form-control" placeholder="Product QTY" required=""
                                value="">
                            @if ($errors->has('product_qty'))
                                <small class="text-danger">
                                    {{ $errors->first('product_qty') }}</small>
                            @endif
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">Selling Price: </label>
                            <input type="text" name="selling_price" id="selling_price"
                                class="form-control" placeholder="Selling Price" required=""
                                value="">
                            @if ($errors->has('selling_price'))
                                <small class="text-danger"> {{ $errors->first('selling_price') }}</small>
                            @endif
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">Discount Price: </label>
                            <input type="number" name="discount_price" id="discount_price"
                                class="form-control" placeholder="Discount Price" required=""
                                value="">
                            @if ($errors->has('discount_price'))
                                <small class="text-danger">
                                    {{ $errors->first('discount_price') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Product Short Desription English: </label>

                            <textarea id="product_short_desc_en" name="product_short_desc_en" class="form-control"
                                placeholder="Product Short Desription English" rows="3"></textarea>
                            @if ($errors->has('product_short_desc_en'))
                                <small class="text-danger">
                                    {{ $errors->first('product_short_desc_en') }}</small>
                            @endif
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Product Short Desription Hindi: </label>
                            <textarea id="product_short_desc_hin" name="product_short_desc_hin" class="form-control"
                                placeholder="Product Short Desription Hindi" rows="3"></textarea>
                            @if ($errors->has('product_short_desc_hin'))
                                <small class="text-danger">
                                    {{ $errors->first('product_short_desc_hin') }}</small>
                            @endif
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Product Long Desription English: </label>

                            <textarea id="product_long_desc_en" name="product_long_desc_en" class="form-control"
                                placeholder="Product Long Desription English" rows="3"></textarea>
                            @if ($errors->has('product_long_desc_en'))
                                <small class="text-danger">
                                    {{ $errors->first('product_long_desc_en') }}</small>
                            @endif
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Product Long Desription Hindi: </label>
                            <textarea id="product_long_desc_hin" name="product_long_desc_hin" class="form-control"
                                placeholder="Product Long Desription Hindi" rows="3"></textarea>
                            @if ($errors->has('product_long_desc_hin'))
                                <small class="text-danger">
                                    {{ $errors->first('product_long_desc_hin') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Image: </label>
                            <input type="file" class="form-control" id="product_thumbnail"
                                name="product_thumbnail"
                                value="{{ isset($data) ? $data->product_thumbnail : old('product_thumbnail') }}">
                            @if ($errors->has('product_thumbnail'))
                                <small class="text-danger">
                                    {{ $errors->first('product_thumbnail') }}</small>
                            @endif
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="form-label">Multiple Image: </label>
                            <input type="file" class="form-control" id="image" name="image[]"
                                value="{{ isset($data) ? $data->image : old('image') }}">
                            @if ($errors->has('image'))
                                <small class="text-danger"> {{ $errors->first('image') }}</small>
                            @endif
                        </div>

                        <div class="mb-3 col-md-12">
                            <img src="{{ isset($data) ? asset('backend_images/' . $data->product_thumbnail) : '' }}"
                                alt="" width="100px" id="viewImage">
                        </div>

                        <div class="mb-3 col-md-12">
                            <img src="{{ isset($data) ? asset('backend_images/' . $data->product_thumbnail) : '' }}"
                                alt="" width="100px" id="viewImage">
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="mb-3 col-md-3">
                            <label class="form-label">Hot Deals </label>
                            <select name="hot_deals" id="hot_deals" class="form-control">
                                <option value="0" selected>No</option>
                                <option value="1">Yes</option>
                            </select>
                            @if ($errors->has('hot_deals'))
                                <small class="text-danger">{{ $errors->first('hot_deals') }}</small>
                            @enderror
                    </div>

                    <div class="mb-3 col-md-3">
                        <label class="form-label">Featured </label>
                        <select name="featured" id="featured" class="form-control">
                            <option value="0" selected>No</option>
                            <option value="1">Yes</option>
                        </select>
                        @if ($errors->has('featured'))
                            <small class="text-danger">{{ $errors->first('featured') }}</small>
                        @enderror
                </div>

                <div class="mb-3 col-md-3">
                    <label class="form-label">Special Offer </label>
                    <select name="special_offer" id="special_offer" class="form-control">
                        <option value="0" selected>No</option>
                        <option value="1">Yes</option>
                    </select>
                    @if ($errors->has('special_offer'))
                        <small class="text-danger">{{ $errors->first('special_offer') }}</small>
                    @enderror
            </div>

            <div class="mb-3 col-md-3">
                <label class="form-label">Special Deals </label>
                <select name="special_deals" id="special_deals" class="form-control">
                    <option value="0" selected>No</option>
                    <option value="1">Yes</option>
                </select>
                @if ($errors->has('special_deals'))
                    <small class="text-danger">{{ $errors->first('special_deals') }}</small>
                @enderror
        </div>


                </div>

            </div>

            <div class="row mb-3 justify-content-center">
                <div class="col-md-3">
                    <div class="card p-3">
                        <button type="submit" id="submit" name="submit"
                        class="btn btn-primary mt-3">
                        Add Product </button>

                    <a href="" class="btn btn-warning mt-3">Back</a>
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
<script src="{{ asset('backend_assets/ckeditor4/ckeditor.js') }}"></script>
<script src="{{ asset('backend_assets/vendor/libs/select2/select2.min.js') }}"></script>
<script src="{{ asset('backend_assets/vendor/libs/tagify/tagify.js') }}"></script>


<script>
    $(document).ready(function() {
        $("#brand_id").select2();
        $("#category_id").select2();
        $("#sub_category").select2();
        $("#sub_sub_category").select2();

        CKEDITOR.replace('product_long_desc_en', {
            height: 250,
        });

        CKEDITOR.replace('product_long_desc_hin', {
            height: 250,
        });

        const product_tags_en = document.querySelector("#product_tags_en");
        const TagifyProductTagsEn = new Tagify(product_tags_en);

        const product_tags_hin = document.querySelector("#product_tags_hin");
        const TagifyProductTagsHin = new Tagify(product_tags_hin);

        const product_size_en = document.querySelector("#product_size_en");
        const TagifyProductSizeEn = new Tagify(product_size_en);

        const product_size_hin = document.querySelector("#product_size_hin");
        const TagifyProductSizeHin = new Tagify(product_size_hin);

        const product_color_en = document.querySelector("#product_color_en");
        const TagifyProductColorEn = new Tagify(product_color_en);

        const product_color_hin = document.querySelector("#product_color_hin");
        const TagifyProductColorHin = new Tagify(product_color_hin);



        $("#product_thumbnail").change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#viewImage").attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });


        $('select[name="category"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    type: "get",
                    url: "{{ url('admin/sub/sub/category/fetch-subcategory') }}/" +
                        category_id,
                    dataType: "JSON",
                    success: function(response) {
                        var data = $('select[name="sub_category"]').empty();
                        $.each(response, function(key, value) {
                            console.log(value);
                            $('select[name="sub_category"]').append(
                                '<option value="' + value.id + '">' + value
                                .sub_category_name_en + '</option>');
                        });
                    }
                });
            } else {

            }
        });
    });
</script>
@endsection
