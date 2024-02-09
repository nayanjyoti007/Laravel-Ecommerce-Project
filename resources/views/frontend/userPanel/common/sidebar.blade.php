@php

$id = Auth::user()->id;
$user = App\Models\User::find($id);

@endphp


<div class="col-md-2"><br>
            <img class="card-img-top" style="border-radius: 50%" src="{{ (!empty($user->profile))? url('backend_images/'.$user->profile):url('admin-man.png') }}" height="100%" width="100%"><br><br>

            <ul class="list-group list-group-flush">
<a href="{{route('user.dashboard')}}" class="btn btn-primary btn-sm btn-block">Dashboard</a>

<a href="{{route('user.profile.')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>

<a href="{{route('user.profile.change-password')}}" class="btn btn-primary btn-sm btn-block">Change Password </a>

<a href="" class="btn btn-primary btn-sm btn-block">My Orders</a>

<a href="" class="btn btn-primary btn-sm btn-block">Return Orders</a>

<a href="" class="btn btn-primary btn-sm btn-block">Cancel Orders</a>

<a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>

            </ul>

        </div>
