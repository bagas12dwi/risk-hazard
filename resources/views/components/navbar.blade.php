<div class="d-flex bg-gray justify-content-between align-items-center mb-4 p-4 profile-section">
    <h1 class="h4 ms-5 text-uppercase">{{ $title }}</h1>
    <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle d-flex align-items-center " role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <div class="text-end me-2">
                <div class="fw-bold">{{ auth()->user()->username }}</div>
                <small class="text-muted text-capitalize">{{ auth()->user()->role }}</small>
            </div>
            <img src="{{ URL::asset('assets/img/foto.png') }}" alt="Profile" class="rounded-circle"
                style="width: 40px; height: 40px" />
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('ganti-password') }}"><i class="fas fa-key"></i> Ganti
                    Password</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                @csrf
            </form>
            <li><a class="dropdown-item" onclick="document.getElementById('logout-form').submit();"><i
                        class="fas fa-right-from-bracket"></i> Logout</a></li>
        </ul>

    </div>
</div>
