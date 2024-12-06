<!-- Sidebar Toggle Button -->
<button id="sidebarToggle" class="btn btn-primary">
    <i class="fas fa-bars"></i>
</button>

<!-- Sidebar -->
<div class="sidebar bg-primary text-white" id="sidebar">
    <!-- Scrollable content -->
    <div class="sidebar-content p-3">
        <div class="sidebar-logo mb-4 d-flex justify-content-center">
            <img src="{{ URL::asset('assets/img/logo1.png') }}" alt="Logo 1" class="me-2" style="height: 30px" />
            <img src="{{ URL::asset('assets/img/logo2.png') }}" alt="Logo 2" class="me-2" style="height: 30px" />
            <img src="{{ URL::asset('assets/img/logo3.png') }}" alt="Logo 3" style="height: 30px" />
        </div>

        @if (auth()->user()->role == 'admin')
            <div class="nav-item p-2 rounded mb-2 {{ url()->current() == route('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="fas fa-th-large me-2"></i> Dashboard
                </a>
            </div>
            <div class="nav-item p-2 rounded mb-2 {{ url()->current() == route('admin.inbox') ? 'active' : '' }}">
                <a href="{{ route('admin.inbox') }}" class="nav-link">
                    <i class="fas fa-clipboard-check me-2"></i> Approval Checklist
                </a>
            </div>
            <div class="nav-item p-2 rounded mb-4 {{ url()->current() == route('admin.user.index') ? 'active' : '' }}">
                <a href="{{ route('admin.user.index') }}" class="nav-link">
                    <i class="fas fa-user me-2"></i> User
                </a>
            </div>
        @endif

        @if (auth()->user()->role == 'pelapor')
            <div class="nav-item p-2 rounded mb-2 {{ url()->current() == route('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fas fa-th-large me-2"></i> Dashboard
                </a>
            </div>
            <div class="nav-item p-2 rounded mb-2 {{ url()->current() == route('inbox') ? 'active' : '' }}">
                <a href="{{ route('inbox') }}" class="nav-link">
                    <i class="far fa-folder me-2"></i> Kotak Masuk
                </a>
            </div>
            <div class="nav-item p-2 rounded mb-2">
                <a href="#pelaporan-collapse" class="nav-link d-flex align-items-center" data-bs-toggle="collapse"
                    aria-expanded="false" aria-controls="pelaporan-collapse">
                    <i class="far fa-folder me-2"></i> Pelaporan
                    <i class="fas fa-chevron-down ms-auto"></i>
                </a>
                <div id="pelaporan-collapse" class="collapse">
                    <ul class="list-unstyled ps-4">
                        <li class="py-2">
                            <a href="{{ route('kecelakaan') }}" class="nav-link"><i
                                    class="fas fa-layer-group me-2"></i>Kecelakaan
                                Kerja</a>
                        </li>
                        <li class="py-2">
                            <a href="{{ route('kejadian') }}" class="nav-link"><i
                                    class="fas fa-layer-group me-2"></i>Kejadian
                                Bahaya</a>
                        </li>
                        <li class="py-2">
                            <a href="{{ route('hampir') }}" class="nav-link"><i
                                    class="fas fa-layer-group me-2"></i>Hampir/Nyaris
                                Kecelakaan</a>
                        </li>
                    </ul>
                </div>
            </div>
        @endif

        @if (auth()->user()->role == 'hse')
            <div class="nav-item p-2 rounded mb-2 {{ url()->current() == route('hse.dashboard') ? 'active' : '' }}">
                <a href="{{ route('hse.dashboard') }}" class="nav-link">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-th-large me-2"></i>
                        <p class="m-0">Dashboard</p>
                    </div>
                </a>
            </div>
            <div class="nav-item p-2 rounded mb-2 {{ url()->current() == route('hse.inbox') ? 'active' : '' }}">
                <a href="{{ route('hse.inbox') }}" class="nav-link">
                    <div class="d-flex align-items-center">
                        <i class="far fa-folder me-2"></i>
                        <p class="m-0">Kotak Masuk</p>
                    </div>
                </a>
            </div>
            <div class="nav-item p-2 rounded mb-2 {{ request()->routeIs('hse.followup.detail') ? 'active' : '' }}">
                <a href="#" class="nav-link">
                    <div class="d-flex align-items-center">
                        <i class="far fa-folder me-2"></i>
                        <p class="m-0">Rancangan Tindak Lanjut</p>
                    </div>
                </a>
            </div>

            <div class="nav-item p-2 rounded mb-2 {{ url()->current() == route('hse.followup') ? 'active' : '' }}">
                <a href="{{ route('hse.followup') }}" class="nav-link">
                    <div class="d-flex align-items-center">
                        <i class="far fa-folder me-2"></i>
                        <p class="m-0">Arsip Perencanaan</p>
                    </div>
                </a>
            </div>
        @endif

    </div>

    <!-- Fixed footer with logout -->
    {{-- <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="dropdown-item">Logout</button>
    </form> --}}
    <div class="sidebar-footer">
        <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
            @csrf
        </form>
        <div class="nav-item p-2 rounded bg-secondary" style="cursor: pointer;"
            onclick="document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt me-2"></i> Logout
        </div>
    </div>
</div>
