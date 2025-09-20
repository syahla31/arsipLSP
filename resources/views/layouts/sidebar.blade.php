<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Arsip<span>Surat</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            {{-- <li class="nav-item nav-category">UTAMA</li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/admin') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li> --}}

            <li class="nav-item">
                <a href="{{ route('surat.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="archive"></i>
                    <span class="link-title">Arsip</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('kategori.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="folder"></i>
                    <span class="link-title">Kategori Surat</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link">
                    <i class="link-icon" data-feather="info"></i>
                    <span class="link-title">About</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
