        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle">
                <span class="brand-text font-weight-light">DTA ASSA'ADAH</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}"
                                class="nav-link{{ request()->routeIs('dashboard') ? ' active' : '' }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        @if (Auth::user()->role == 'Admin')
                            <li class="nav-header">Master Data</li>
                            <li class="nav-item">
                                <a href="{{ route('users') }}"
                                    class="nav-link{{ request()->routeIs('users') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Users
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('siswa') }}"
                                    class="nav-link{{ request()->routeIs('siswa') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Siswa
                                    </p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-header">Transaksi</li>
                        @if (Auth::user()->role == 'Orang Tua')
                            <li class="nav-item">
                                <a href="{{ route('payment.user') }}"
                                    class="nav-link{{ request()->routeIs('payment.user') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-credit-card"></i>
                                    <p>
                                        Payment
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->role == 'Admin')
                            <li class="nav-item">
                                <a href="{{ route('payment') }}"
                                    class="nav-link{{ request()->routeIs('payment') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-credit-card"></i>
                                    <p>
                                        Payment
                                    </p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
