<header class="navbar">
    <button class="drawer-toggle" onclick="toggleDrawer()">☰</button>

    <nav class="nav-menu">
        <a href="{{ route('home') }}">Beranda</a>
        <a href="{{ route('kegiatan') }}">Kegiatan</a>
        <a href="{{ route('kontak') }}">Kontak</a>
    </nav>
</header>

{{-- DRAWER --}}
<aside id="drawer" class="drawer">
    <a href="{{ route('home') }}" onclick="closeDrawer()">Beranda</a>
    <a href="{{ route('kegiatan') }}" onclick="closeDrawer()">Kegiatan</a>
    <a href="{{ route('kontak') }}" onclick="closeDrawer()">Kontak</a>
</aside>
