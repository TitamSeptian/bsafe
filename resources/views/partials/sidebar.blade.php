<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                    <img src="{{ asset('assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
                </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ $activePage == 'dashboard' ? 'active' : '' }}" href="">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="ni ni-planet text-orange"></i>
                                <span class="nav-link-text">Materi</span>
                            </a>
                        </li>
                        @if(Auth::user()->roles == "operator" || Auth::user()->roles == "admin")
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="ni ni-single-02 text-primary"></i>
                                <span class="nav-link-text">Sopir</span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::user()->roles == "admin")
                        <li class="nav-item">
                            <a class="nav-link {{ $activePage == 'operator' ? 'active' : '' }}" href="{{ route('operator.index') }}">
                                <i class="fas fa-users text-yellow"></i>
                                {{-- <i class="ni ni-single-02 text-yellow"></i> --}}
                                <span class="nav-link-text">Operator</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                    <h6 class="navbar-heading p-0 text-muted">
                        <span class="docs-normal">Lainnya</span>
                    </h6>
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-3">
                        <li class="nav-item">
                            <a class="nav-link" href="" target="_blank">
                                <i class="ni ni-spaceship"></i>
                                <span class="nav-link-text">Tentang Kami</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="" target="_blank">
                                <i class="ni ni-palette"></i>
                                <span class="nav-link-text">Kebijakan Privasi</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>