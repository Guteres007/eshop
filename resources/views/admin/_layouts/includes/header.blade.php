<button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
    data-class="c-sidebar-show">
    <i class="cil-menu"></i>
</button><a class="c-header-brand d-lg-none" href="#">
    <svg width="118" height="46" alt="CoreUI Logo">
        <use xlink:href="assets/brand/coreui.svg#full"></use>
    </svg></a>
<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar"
    data-class="c-sidebar-lg-show" responsive="true">
    <i class="cil-menu"></i>
</button>
<ul class="c-header-nav d-md-down-none">
    <li class="c-header-nav-item px-3"><a class="c-header-nav-link"
            href="{{ route('admin.dashboard') }}">Dashboard</a>
    </li>
    <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Uživatelé</a></li>
    <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Nastavení</a></li>
</ul>
<ul class="c-header-nav ml-auto mr-4">
    <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
            <svg class="c-icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
            </svg></a></li>
    <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
            <svg class="c-icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list-rich"></use>
            </svg></a></li>
    <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
            <svg class="c-icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
            </svg></a></li>
    <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button"
            aria-haspopup="true" aria-expanded="false">
            <div class="c-avatar">
                <img style="width:30px;" src="/images/admin/avatar.png"
                    alt="{{ Auth::guard('admin')->user()->name }}">
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right pt-0">

            <div class="dropdown-header bg-light py-2"><strong>Profil</strong></div><a class="dropdown-item"
                href="#"></a>

            <form class="text-center" action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button class="btn btn-danger" type="submit">Odhlásit</button>
            </form>
        </div>
    </li>
</ul>
<!--
<div class="c-subheader px-3">

    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active">Dashboard</li>

    </ol>
</div>
-->
