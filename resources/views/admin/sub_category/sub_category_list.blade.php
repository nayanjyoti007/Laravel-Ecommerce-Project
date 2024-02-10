@extends('admin.layout.master')
@section('title', 'Admin | Sub Category')
@section('subcategorymenu', 'active')
@section('headerTitle', 'Sub Category')
@section('catrgoryOpen', 'open')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row justify-content-center">

                <div class="col-md-10">
                    <div id="result">

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif


                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered pt-3" id="myTable">
                                <thead class="table-dark">
                                    <tr>
                                        <th style="width:10%">SL NO</th>
                                        <th>Sub Catrgory Name (Eng) </th>
                                        <th>Sub Catrgory Name (Hin) </th>
                                        <th>Category </th>
                                        <th>Status </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">

                                    @forelse ($subcategory as $item)
                                        <tr id="trRow{{ $item->id }}">
                                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>
                                                    {{ $loop->iteration }} </strong></td>
                                            <td>
                                                {{ $item->sub_category_name_en }}
                                            </td>
                                            <td>
                                                {{ $item->sub_category_name_hin }}
                                            </td>
                                            <td>
                                               {{ $item->category->category_name_en}}
                                            </td>
                                            <td>

                                                @if ($item->status == 2)
                                                    <span class="badge rounded-pill bg-dark">De Active</span>
                                                @else
                                                    <span class="badge rounded-pill bg-danger">Active</span>
                                                @endif
                                            </td>
                                            {{-- <td>
                                                {{$item->phone}}
                                            </td>
                                            <td>
                                                {{$item->joining_date}}
                                            </td> --}}
                                            {{-- <td>
                                                <a href="{{asset('backend_images/'.$item->course_image)}}" class="btn btn-sm btn-info" target="_blank"> <i class="fa fa-eye" aria-hidden="true"></i> View File</a>
                                            </td> --}}

                                            {{-- <td>
                                                {{$item->short_description}}
                                            </td> --}}

                                            <td>

                                                <a href="{{route('admin.sub.category.form', ['id' => $item->id])}}"
                                                    class="btn btn-primary-ssn btn-sm">
                                                    <i class="fa fa-pencil mr-1" aria-hidden="true"></i> Edit</a>

                                                {{-- <a href=""
                                                    class="btn btn-warning btn-sm" data-id="{{ $item->id }}">
                                                    Status</a> --}}




                                                <a href="javascript:void(0)"
                                                    class="btn btn-warning btn-sm text-dark delete_item"
                                                    data-id="{{ $item->id }}">
                                                    <i class="fa fa-trash  mr-1" aria-hidden="true"></i> Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="{{route('admin.sub.category.form')}}" class="btn btn-primary">Add Sub Category</a>
                </div>
            </div>

        </div>
        <!-- / Content -->


    @endsection

    @section('script')

        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

        <script>
            $(document).ready(function () {
                let table = new DataTable('#myTable');


                $(".delete_item").click(function(e) {
                    e.preventDefault();
                    let id = $(this).attr('data-id');
                    // alert(id);

                    swal({
                            title: "Are you sure?",
                            text: "Once deleted, you will not be able to recover this data!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {

                                $.ajax({
                                    type: "GET",
                                    url: "{{ route('admin.sub.category.delete') }}",
                                    data: {
                                        id: id
                                    },
                                    success: function(response) {
                                        console.log(response);
                                        if (response.success == true) {
                                            swal(response.message, {
                                                icon: "success",
                                            });

                                            // $("#trRow" + id).fadeOut(300, function() {
                                            //     $("#trRow" + id).remove();
                                            // });

                                            // location.reload();

                                            setTimeout(() => {
                                                location.reload();
                                            }, 1500);

                                        } else {
                                            alert(response.message);
                                        }
                                    }
                                });

                            }
                            // else {
                            //   swal("Your data is safe!");
                            // }
                        });
                });
            });
        </script>
    @endsection
