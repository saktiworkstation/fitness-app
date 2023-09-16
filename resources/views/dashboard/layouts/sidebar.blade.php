<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" hrefaria-current="page"
                    href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
                <a class="nav-link {{ Request::is('/dashboard/schedules') ? 'active' : '' }}" hrefaria-current="page"
                    href="/dashboard/schedules">
                    <span data-feather="calendar"></span>
                    Training Schedule
                </a>
                <a class="nav-link {{ Request::is('/dashboard/promotions') ? 'active' : '' }}" hrefaria-current="page"
                    href="/dashboard/promotions">
                    <span data-feather="gift"></span>
                    Promotions
                </a>
                <a class="nav-link {{ Request::is('/dashboard/services') ? 'active' : '' }}" hrefaria-current="page"
                    href="/dashboard/services">
                    <span data-feather="file-text"></span>
                    Services
                </a>
            </li>
        </ul>

        @can('admin')
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1">
                <span>Administrator</span>
            </h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/absentions">
                        <span data-feather="edit"></span>
                        Absention
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/user-subscriptions">
                        <span data-feather="users"></span>
                        User Subscriptions
                    </a>
                </li>
            </ul>
        @endcan

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1">
            <span>Member</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/training-histories">
                    <span data-feather="activity"></span>
                    Training History
                </a>
            </li>
        </ul>
    </div>
</nav>
