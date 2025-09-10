<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}"><img src="{{ asset('img/SirapatHME.png') }}" alt="SRP Logo" style="width: 150px; height: auto;"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}"><img src="{{ asset('img/FIX.png') }}" alt="SRP Logo" style="width: 30px; height: auto;"></a>
        </div>
        <ul class="sidebar-menu">

            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
            </li>
        @can('user')
            <li class="nav-item">
                <a href="{{ route('profile.index') }}" class="nav-link"><i class="fas fa-user"></i><span>Profile</span></a>
            </li>
        @endcan
            <li class="nav-item">
                <a href="{{ route('schedule.index') }}" class="nav-link"><i class="fas fa-calendar-alt"></i><span>Schedules</span></a>
            </li>
        @can('admin')
            <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link"><i class="fas fa-users"></i><span>Users</span></a>
            </li>
        @endcan
        @can('admin')
            <li class="nav-item">
                <a href="{{ route('kegiatan.index') }}" class="nav-link"><i class="fas fa-calendar-check"></i><span>Kelola Kegiatan</span></a>
            </li>
        @endcan
        @can('admin')
            <li class="nav-item">
                <a href="{{ route('controlPanel.index') }}" class="nav-link"><i class="bi bi-globe"></i><span>Control Panel</span></a>
            </li>
        @endcan
        </ul>
    </aside>
</div>
