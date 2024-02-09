<ul class="menu-inner py-1">
    <!-- Dashboard -->

    <li class="menu-item @yield('dashboard')">
        <a href="{{route('user.dashboard')}}" class="menu-link">
            <i class="menu-icon fa fa-home" aria-hidden="true"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>






    {{-- <li class="menu-item @yield('documentUpload')">
        <a href="{{ route('user.document.form') }}" class="menu-link">
            <i class="menu-icon fa fa-file-text" aria-hidden="true"></i>
            <div data-i18n="Analytics"> Document Upload</div>
        </a>
    </li> --}}

    <li class="menu-item @yield('profile')">
        <a href="{{ route('user.profile.form') }}" class="menu-link">
            <i class="menu-icon fa fa-user" aria-hidden="true"></i>
            <div data-i18n="Analytics"> Profile</div>
        </a>
    </li>


    {{-- <li class="menu-item">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
            <i class="menu-icon fa fa-black-tie" aria-hidden="true"></i>
            <div data-i18n="Form Elements"> Master </div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item @yield('location')">
                <a href="" class="menu-link">
                    <!-- <i class="menu-icon fa fa-external-link" aria-hidden="true"></i> -->
                    <div data-i18n="Basic Inputs">Location</div>
                </a>
            </li>

            <li class="menu-item @yield('all_employees')">
                <a href="" class="menu-link">
                    <!-- <i class="menu-icon fa fa-external-link" aria-hidden="true"></i> -->
                    <div data-i18n="Basic Inputs">Weight </div>
                </a>
            </li>
        </ul>
    </li> --}}





    {{-- <li class="menu-item @yield('slider')">
        <a href="{{route('admin.slider.list')}}" class="menu-link">
            <i class="menu-icon fa fa-picture-o" aria-hidden="true"></i>
            <div data-i18n="Analytics">Slider</div>
        </a>
    </li>


    <li class="menu-item @yield('gallery')">
        <a href="{{route('admin.gallery.list')}}" class="menu-link">
            <i class="menu-icon fa fa-file-image-o" aria-hidden="true"></i>
            <div data-i18n="Analytics">Gallery</div>
        </a>
    </li>


    <li class="menu-item @yield('changepassword')">
        <a href="{{route('admin.changePasswordForm')}}" class="menu-link">
            <i class="menu-icon fa fa-key" aria-hidden="true"></i>
            <div data-i18n="Analytics">Change Password</div>
        </a>
    </li> --}}







    <li class="menu-item">
        <a href="{{route('user.logout')}}" class="menu-link">
            <i class="menu-icon fa fa-power-off" aria-hidden="true"></i>
            <div data-i18n="Analytics">Logout</div>
        </a>
    </li>

</ul>
