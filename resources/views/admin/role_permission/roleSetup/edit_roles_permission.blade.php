@extends('admin.layout.master')
@section('title', 'Admin | Ecommerce Project | Edit Role in Permission')
@section('rolepermission', 'active')
@section('open', 'open')
@section('content')
    <style type="text/css">
        .form-check-label {
            text-transform: capitalize;
        }
    </style>
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
                                Edit Role in Permission
                            @else
                                Edit Role in Permission
                            @endif



                        </h5>
                        <div class="card-body">
                            <form action="{{ route('admin.updateRolePermission', ['id' => $roles->id])}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">


                                    {{-- <div class="mb-3 col-md-12">
                                        <label class="form-label">Role Name </label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{isset($data) ? $data->name : old('name')}}">
                                        @if ($errors->has('name'))
                                            <small class="text-danger"> {{ $errors->first('name') }}</small>
                                        @endif
                                    </div> --}}

                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">Select Role </label>
                                        {{-- <select name="role_id" id="role_id" class="form-control" required>
                                            <option selected disabled>Select Role</option>
                                            @foreach ($roles as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ isset($data) ? ($data->id == $item->id ? 'selected' : '') : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select> --}}
                                        <input type="text" class="form-control" id="role_id" name="role_id"
                                            value="{{ isset($roles) ? $roles->name : old('role_id') }}" readonly>
                                        @if ($errors->has('role_id'))
                                            <span style="color: red">{{ $errors->first('role_id') }}</span>
                                        @enderror
                                </div>

                                <div class="mb-3 col-md-2"></div>

                                {{-- <div class="mb-3 col-md-4">
                                    <label class="form-label">Check All Permission </label>
                                    <div class="form-check mt-1">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="checkDefaultmain">
                                        <label class="form-check-label" for="checkDefaultmain">
                                            Permission All
                                        </label>
                                    </div>
                                    @if ($errors->has('role_id'))
                                        <span style="color: red">{{ $errors->first('role_id') }}</span>
                                    @enderror
                            </div> --}}

                                <hr>

                                @forelse ($permission_groups as $group)
                                    <div class="row">
                                        <div class="col-md-2">

                                            @php
                                                $permissions = APP\Models\Admin::getPermissionGroupName($group->group_name);
                                            @endphp


                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Group Name </label>
                                                <div class="form-check mt-1">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="defaultCheck1" {{APP\Models\Admin::roleHasPermissions($roles,$permissions) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        {{ $group->group_name }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-10">

                                            @php
                                                $permissions = APP\Models\Admin::getPermissionGroupName($group->group_name);
                                            @endphp

                                            <div class="row mt-4">
                                                @forelse ($permissions as $permission)
                                                    <div class="col-md-2">
                                                        <div class="mb-3 col-md-12">

                                                            <div class="form-check mt-1">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="{{ $permission->id }}" name="permission_id[]"
                                                                    id="{{ $permission->id }}" {{$roles->hasPermissionTo($permission->name) ? 'checked' : ''}}>
                                                                <label class="form-check-label"
                                                                    for="{{ $permission->id }}">
                                                                    {{ $permission->name }}
                                                                </label>
                                                            </div>
                                                            @if ($errors->has('role_id'))
                                                                <span
                                                                    style="color: red">{{ $errors->first('role_id') }}</span>
                                                            @enderror
                                                    </div>
                                                </div>
                                            @empty
                                            @endforelse



                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @empty
                            @endforelse


                        </div>


                        <button type="submit" id="submit" name="submit" class="btn btn-primary btn-sm mt-3">
                            Update </button>

                        <a href="{{ route('admin.allRolePermission') }}" class="btn btn-warning btn-sm mt-3">Back</a>
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


        $('#checkDefaultmain').click(function() {
            if ($(this).is(':checked')) {
                $('input[ type= checkbox]').prop('checked', true);
            } else {
                $('input[ type= checkbox]').prop('checked', false);
            }
        });

    });
</script>
@endsection
