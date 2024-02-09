@extends('admin.layout.master')
@section('title', 'Admin | Ecommerce Project')
@section('userlist', 'active')
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
                            <table class="table table-bordered" id="data">
                                <thead class="table-dark">
                                    <tr>
                                        <th>SL NO</th>
                                        <th>Registration ID </th>
                                        <th>Name </th>
                                        <th>Mobile </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">

                                    @forelse ($data as $item)
                                        <tr id="trRow{{ $item->id }}">
                                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>
                                                    {{ $loop->iteration }} </strong></td>

                                            <td>
                                                {{ $item->regn_id }}
                                            </td>
                                            <td>
                                                {{ $item->fullname }}
                                            </td>

                                            <td>
                                                {{ $item->mobile }}
                                            </td>



                                            <td>

                                                @if (Auth::user()->can('user.edit'))
                                                    <a href="" class="btn btn-primary-ssn btn-sm">
                                                        <i class="fa fa-pencil mr-1" aria-hidden="true"></i> Edit</a>
                                                @endif

                                                {{-- <a href="javascript:void(0)"
                                                    class="btn btn-primary btn-sm delete_item"
                                                    data-id="{{ $item->id }}">
                                                    <i class="fa fa-undo  mr-1" aria-hidden="true"></i> Status</a> --}}




                                                {{-- <a href="javascript:void(0)"
                                                    class="btn btn-warning btn-sm text-dark delete_item"
                                                    data-id="{{ $item->id }}">
                                                    <i class="fa fa-trash  mr-1" aria-hidden="true"></i> Delete</a> --}}
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-2">
                    <a href="{{ route('admin.gallery.form') }}" class="btn btn-primary">Add Gallery Image</a>
                </div> --}}
            </div>

        </div>
        <!-- / Content -->

    @endsection

    @section('script')
        <script>
            $(document).ready(function() {
                // $('#myTable').DataTable();


            });
        </script>
    @endsection
