<div class="min-height-300 bg-primary position-absolute w-100"></div>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('backend/images/techX.png') }}" class="navbar-brand-img h-125" alt="main_logo">
            <span class="ms-1 font-weight-bold">{{ config('app.name') }}</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="ps ps--active-y w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item nv">
                <a class="nv-link nav-link {{ url()->current() == route('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nv mt-1">
                <a class="nv-link nav-link {{ url()->current() == route('admin.index') ? 'active' : '' }}" href="{{ route('admin.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ri-user-settings-fill text-lg opacity-10 text-warning"></i>
                    </div>
                    <span class="nav-link-text ms-1">Admins</span>
                </a>
            </li>
            <li class="nav-item nv mt-1">
                <a class="nv-link nav-link {{ url()->current() == route('instructor.index') ? 'active' : '' }}" href="{{ route('instructor.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-hat-3 text-danger text-lg opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Instructors</span>
                </a>
            </li>
            <li class="nav-item nv mt-1">
                <a class="nv-link nav-link {{ url()->current() == route('user.index') ? 'active' : '' }}" href="{{ route('user.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Users</span>
                </a>
            </li>
            <li class="nav-item nv mt-1">
                <a class="nv-link nav-link {{ url()->current() == route('category.index') ? 'active' : '' }}" href="{{ route('category.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni ni-bullet-list-67 text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Category</span>
                </a>
            </li>
        </ul>
    </div>

</aside>


