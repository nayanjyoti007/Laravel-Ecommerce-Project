<ul class="menu-inner py-1">
    <!-- Dashboard -->

    <li class="menu-item @yield('dashboard')">
        <a href="{{ route('admin.dashboard') }}" class="menu-link">
            <i class="menu-icon fa fa-home" aria-hidden="true"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>

    {{-- Brand Start --}}
    <li class="menu-item @yield('brandOpen')">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
            <i class="menu-icon fa fa-black-tie" aria-hidden="true"></i>
            <div data-i18n="Form Elements"> Brand </div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item @yield('brandmenu')">
                <a href="{{ route('admin.brand.list') }}" class="menu-link">
                    <!-- <i class="menu-icon fa fa-external-link" aria-hidden="true"></i> -->
                    <div data-i18n="Basic Inputs">All Brand</div>
                </a>
            </li>
        </ul>
    </li>
    {{-- Brand End --}}

    {{-- Category Start --}}
    <li class="menu-item @yield('catrgoryOpen')">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
            <i class="menu-icon fa fa-black-tie" aria-hidden="true"></i>
            <div data-i18n="Form Elements"> Category </div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item @yield('categorymenu')">
                <a href="{{ route('admin.category.list') }}" class="menu-link">
                    <!-- <i class="menu-icon fa fa-external-link" aria-hidden="true"></i> -->
                    <div data-i18n="Basic Inputs">All Category</div>
                </a>
            </li>

            <li class="menu-item @yield('subcategorymenu')">
                <a href="{{ route('admin.sub.category.list') }}" class="menu-link">
                    <!-- <i class="menu-icon fa fa-external-link" aria-hidden="true"></i> -->
                    <div data-i18n="Basic Inputs">All Sub Category</div>
                </a>
            </li>


            <li class="menu-item @yield('subsubcategorymenu')">
                <a href="{{ route('admin.sub.sub.category.list') }}" class="menu-link">
                    <!-- <i class="menu-icon fa fa-external-link" aria-hidden="true"></i> -->
                    <div data-i18n="Basic Inputs">All Sub Sub Category</div>
                </a>
            </li>

        </ul>
    </li>
    {{-- Category End  --}}


    {{-- Products Start --}}
    <li class="menu-item @yield('productOpen')">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
            <i class="menu-icon fa fa-black-tie" aria-hidden="true"></i>
            <div data-i18n="Form Elements"> Products </div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item @yield('addproductmenu')">
                <a href="{{ route('admin.product.add') }}" class="menu-link">
                    <!-- <i class="menu-icon fa fa-external-link" aria-hidden="true"></i> -->
                    <div data-i18n="Basic Inputs">Add Product</div>
                </a>
            </li>

            <li class="menu-item @yield('manageproductmenu')">
                <a href="{{ route('admin.brand.list') }}" class="menu-link">
                    <!-- <i class="menu-icon fa fa-external-link" aria-hidden="true"></i> -->
                    <div data-i18n="Basic Inputs">Manage Product</div>
                </a>
            </li>

        </ul>
    </li>
    {{-- Product End  --}}










    <li class="menu-item @yield('changepassword')">
        <a href="{{ route('admin.changePasswordForm') }}" class="menu-link">
            <i class="menu-icon fa fa-key" aria-hidden="true"></i>
            <div data-i18n="Analytics">Change Password</div>
        </a>
    </li>



        <li class="menu-item @yield('open')">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon fa fa-black-tie" aria-hidden="true"></i>
                <div data-i18n="Form Elements"> Role & Permission </div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @yield('permission')">
                    <a href="{{ route('admin.permission.allPermission') }}" class="menu-link">
                        <!-- <i class="menu-icon fa fa-external-link" aria-hidden="true"></i> -->
                        <div data-i18n="Basic Inputs">All Permission</div>
                    </a>
                </li>

                <li class="menu-item @yield('role')">
                    <a href="{{ route('admin.role.allRole') }}" class="menu-link">
                        <!-- <i class="menu-icon fa fa-external-link" aria-hidden="true"></i> -->
                        <div data-i18n="Basic Inputs">All Role </div>
                    </a>
                </li>

                <li class="menu-item @yield('allrolepermission')">
                    <a href="{{ route('admin.allRolePermission') }}" class="menu-link">
                        <!-- <i class="menu-icon fa fa-external-link" aria-hidden="true"></i> -->
                        <div data-i18n="Basic Inputs">All Role in Permission </div>
                    </a>
                </li>

                <li class="menu-item @yield('rolepermission')">
                    <a href="{{ route('admin.addRolePermission') }}" class="menu-link">
                        <!-- <i class="menu-icon fa fa-external-link" aria-hidden="true"></i> -->
                        <div data-i18n="Basic Inputs">Role in Permission </div>
                    </a>
                </li>


                <li class="menu-item @yield('createadmin')">
                    <a href="{{ route('admin.crateadmin.list') }}" class="menu-link">
                        <!-- <i class="menu-icon fa fa-external-link" aria-hidden="true"></i> -->
                        <div data-i18n="Basic Inputs">Create Admin </div>
                    </a>
                </li>


            </ul>
        </li>







    <li class="menu-item">
        <a href="{{ route('admin.logout') }}" class="menu-link">
            <i class="menu-icon fa fa-power-off" aria-hidden="true"></i>
            <div data-i18n="Analytics">Logout</div>
        </a>
    </li>

</ul>
