@extends('user.layout.master')
@section('title', 'User Dashboard | Ecommerce Project')
@section('dashboard', 'active')
@section('headerTitle', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h3 class="card-title text-primary">Welcome @if (Auth::guard('web')->user())
                                        {{Auth::guard('web')->user()->fullname}}
                                    @endif !! 🎉</h3>
                                    <h5 class="mb-4">
                                        Ecommerce Project
                                    </h5>
                                </div>
                            </div>
                            <div class="col-sm-5 text-center text-sm-left mb-5">
                                <!-- <div class="card-body pb-0 px-0 px-md-4"> -->
                                {{-- <img src="{{ asset('backend_assets/logo/logo.jpg') }}" alt="" class="logo_img"
                                    style="width: 100%;"> --}}

                                <!-- <img src="{{ asset('backend_assets/img/illustrations/man-with-laptop-light.png') }}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" /> -->
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-primary mb-3">Total Appointment Booking</h4>
                            <div class="card-title mb-0 d-flex align-items-start justify-content-between">
                                <h3 class="new-bage">150</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-primary mb-3">Today Enquiry</h4>
                            <div class="card-title mb-0 d-flex align-items-start justify-content-between">
                                <h3 class="new-bage text-danger">5</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-primary mb-3">Total Enquiry</h4>
                            <div class="card-title mb-0 d-flex align-items-start justify-content-between">
                                <h3 class="new-bage text-success">5</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Bootstrap Table with Header - Dark -->
            <div class="card mb-4">
                <h5 class="card-header"><span></span> Recent Bilty Create </h5>
                <div class="card-body">
                    <div class="mb-4">
                        <form>
                            <div class="row align-items-center">
                                <div class="col-md-3 pb-1">
                                    <input type="text" class="form-control" placeholder="Search By Bilty">
                                </div>
                                <div class="col-md-2 pb-1">
                                    <button class="btn btn-primary-ssn btn-sm w-100">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- <div id="result">
                        <div class="table-responsive text-nowrap">
                            <div class="table-responsive text-nowrap">
                                <table class="table table-bordered" id="data">
                                    <thead class="table-dark">
                                        <tr>
                                            <th style="width:10%">Emp. Id</th>
                                            <th>Emp. Name </th>
                                            <th>Request Date </th>
                                            <th>Remark</th>
                                            <th style="width: 20%;">Action</th>
                                            <th style="width: 10%;">View </th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <tr>
                                            <td> <strong> SSN1001 </strong></td>
                                            <td>Dibya Jyoti Choudhury</td>
                                            <td> 15-01-2023 To 16-01-2023</td>
                                            <td>Personal Work</td>
                                            <td><select class="form-select" name="gender">
                                                    <option selected disabled>Select Status</option>
                                                    <option value="ap">Approve</option>
                                                    <option value="nap">Not Approve</option>
                                                    <option value="h">Hold</option>
                                                </select></td>
                                            <td><a href="#" class="btn btn-primary-ssn btn-sm w-100"><i
                                                        class="fa fa-eye mr-1" aria-hidden="true"></i>
                                                    View</a> </td>
                                        </tr>
                                        <tr>
                                            <td> <strong> SSN1002 </strong></td>
                                            <td>Prakash Boul</td>
                                            <td> 07-01-2023 To 09-01-2023</td>
                                            <td>Fever</td>
                                            <td><select class="form-select" name="gender">
                                                    <option selected disabled>Select Status</option>
                                                    <option value="ap">Approve</option>
                                                    <option value="nap">Not Approve</option>
                                                    <option value="h">Hold</option>
                                                </select></td>
                                            <td>
                                                <a href="#" class="btn btn-primary-ssn btn-sm w-100"><i
                                                        class="fa fa-eye mr-1" aria-hidden="true"></i>
                                                    View</a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td> <strong> SSN1003 </strong></td>
                                            <td>Nayanjyoti Kalita</td>
                                            <td> 10-01-2023 To 12-01-2023</td>
                                            <td>Headache</td>
                                            <td><select class="form-select" name="gender">
                                                    <option selected disabled>Select Status</option>
                                                    <option value="ap">Approve</option>
                                                    <option value="nap">Not Approve</option>
                                                    <option value="h">Hold</option>
                                                </select></td>
                                            <td><a href="#" class="btn btn-primary-ssn btn-sm w-100"><i
                                                        class="fa fa-eye mr-1" aria-hidden="true"></i>
                                                    View</a> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <!--/ Bootstrap Table with Header Dark -->
        </div>






        @include('admin.include.footer')

        <div class="content-backdrop fade"></div>
    </div>
@endsection
