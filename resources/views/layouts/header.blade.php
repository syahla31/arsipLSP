<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <form class="search-form">
            <div class="input-group">
                <div class="input-group-text">
                    {{-- <i data-feather="search"></i> --}}
                </div>
                {{-- <input type="text" class="form-control" id="navbarForm" placeholder="Search here..."> --}}
            </div>
        </form>

        <ul class="navbar-nav">
            <!-- Notifikasi Pesanan Pending -->            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="position-relative">
                        <img class="wd-30 ht-30 rounded-circle" 
                            src="{{ url('https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p3/75/2024/06/17/Suho-EXO-Poplineidd-3816788752.png') }}"
                            alt="profile">
                    </div>
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                            <img class="wd-80 ht-80 rounded-circle" 
                                src="{{ url('https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p3/75/2024/06/17/Suho-EXO-Poplineidd-3816788752.png') }}"
                                alt="">
                        </div>
                        <div class="text-center">
                            <p class="tx-16 fw-bolder">Syahla' Syafiqah Fayra</p>
                            <p class="tx-12 text-muted">2141720015</p>
                        </div>
                    </div>
                    <ul class="list-unstyled p-1">
                        {{-- <li class="dropdown-item py-2">
                            <a href="{{ route('penjualan.index') }}" class="text-body d-flex align-items-center">
                                <i class="me-2 icon-md" data-feather="shopping-bag"></i>
                                <span class="fw-medium">Pesanan</span>
                            </a>
                        </li> --}}
                        {{-- <li class="dropdown-item py-2">
                            <a href="{{ route('logout') }}" class="text-body d-flex align-items-center no-underline"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="me-2 icon-md" data-feather="log-out"></i>
                                <span class="fw-medium">Log Out</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li> --}}
                    </ul>                    
                </div>
            </li>
        </ul>
    </div>
</nav>

<!-- CSS untuk notifikasi -->
<style>
    .notification-dropdown {
        max-width: 320px;
        width: 320px;
        max-height: 350px;
        overflow: hidden;
    }
    
    .notification-scroll {
        max-height: 260px;
        overflow-y: auto;
    }
    
    .pulse-badge {
        animation: pulse 1.5s infinite;
    }
    
    @keyframes pulse {
        0% {
            transform: scale(0.95);
            box-shadow: 0 0 0 0 rgba(255, 64, 129, 0.7);
        }
        
        70% {
            transform: scale(1);
            box-shadow: 0 0 0 6px rgba(255, 64, 129, 0);
        }
        
        100% {
            transform: scale(0.95);
            box-shadow: 0 0 0 0 rgba(255, 64, 129, 0);
        }
    }
</style>