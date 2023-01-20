<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="https://sisi.id/wp-content/uploads/2019/07/Logo-SISI-new-1-300x153-1.png" alt="SISI SIG Logo"
            class="brand-image elevation-0" style="opacity: .8">
        <span class="brand-text font-weight-light">Sisi SIG</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
            <div class="image">
                <img src="{{ getUserPhoto() ?? 'https://xsgames.co/randomusers/avatar.php?g=pixel' }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name ?? 'User' }}</a>
                <span class="d-block text-light">{{ auth()->user()->email }}</span>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @foreach (menusSideBar() as $item)
                    @if (count(@$item['child']) && in_array(@$item['id'], getMenuAccessUser()))
                        <li class="nav-item @if ($menu == @$item['name']) menu-open @endif">
                            <a href="#" class="nav-link @if ($menu == @$item['name']) active @endif">
                                <img src="{{ @$item['icon'] }}" class="nav-icon">
                                <p>
                                    {{ @$item['name'] }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @foreach ($item['child'] as $row)
                                    <li class="nav-item">
                                        <a href="{{ @$row['link'] }}"
                                            class="nav-link @if ($menu == @$item['name']) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ @$row['name'] }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @elseif(in_array(@$item['id'], getMenuAccessUser()))
                        <li class="nav-item">
                            <a href="{{ @$item['link'] }}"
                                class="nav-link @if ($menu == @$item['name']) active @endif">
                                <img src="{{ @$item['icon'] }}" class="nav-icon">
                                <p>
                                    {{ @$item['name'] }}
                                </p>
                            </a>
                        </li>
                    @endif
                @endforeach
                {{-- <li class="nav-item">
                    <a href="{{ route('menu') }}" class="nav-link">
                        <img src="https://cdn-icons-png.flaticon.com/512/9445/9445360.png" class="nav-icon">
                        <p>
                            Menus
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('menu-level') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Menu Level
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('user-edit', [auth()->user()->id]) }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Edit Profile
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"
                        class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
