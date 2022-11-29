<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        {{-- <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="text-wrapper">
                    <p class="profile-name">{{auth()->user()->name}}</p>
                    <p class="designation">admin</p>
                </div>
            </a>
        </li> --}}

        <li class="nav-item nav-category">Main Menu</li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard.dashboard')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        @can('persone')
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard.persone')}}">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Person</span>
            </a>
        </li>
        @endcan


        {{-- <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard.food')}}">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Meal</span>
            </a>
        </li> --}}
        @can('order')
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard.order')}}">
                    <i class="menu-icon typcn typcn-shopping-bag"></i>
                    <span class="menu-title">Food Order</span>
                </a>
            </li>
        @endcan

        @can('expences')
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard.expences')}}">
                    <i class="menu-icon typcn typcn-shopping-bag"></i>
                    <span class="menu-title">Expenses</span>
                </a>
            </li>
        @endcan

        @can('users')
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard.users')}}">
                    <i class="menu-icon typcn typcn-shopping-bag"></i>
                    <span class="menu-title">Users</span>
                </a>
            </li>
        @endcan

        @can('permission')
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard.permission')}}">
                    <i class="menu-icon typcn typcn-shopping-bag"></i>
                    <span class="menu-title">Permissions</span>
                </a>
            </li>
        @endcan

    </ul>
</nav>
