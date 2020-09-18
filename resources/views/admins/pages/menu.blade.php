<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"> {{ trans('message.admin') }} <sup>2</sup></div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route ('change-language', config ('localization.vi')) }}">Viet Nam</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route ('change-language', config ('localization.en')) }}">English</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route ('posts.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>{{ trans ('message.blog') }}</span>
        </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-table"></i>
            <span>{{ trans ('message.user') }}</span>
        </a>
    </li>

</ul>
