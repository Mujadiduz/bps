@extends('layouts.app')

@section('title', 'Beranda | BPS Kabupaten Pasuruan')

@section('content')
{{-- HERO PROFILE --}}
<section class="hero-split hero-profile">
    <div class="hero-container">
        <div class="hero-photo-profile">
            <img src="{{ isset($settings['profile_hero_image']) ? asset('storage/'.$settings['profile_hero_image']) : 'https://via.placeholder.com/800x600' }}" alt="Hero Profile">
        </div>
        <div class="hero-text-profile">
            <img src="{{ asset('images/bps1.png') }}" alt="Logo BPS" class="hero-logo">
            <h1>{!! $settings['profile_hero_title'] ?? 'SATU DATA, BANYAK MAKNA...' !!}</h1>
            <p>{!! nl2br(e($settings['profile_hero_subtitle'] ?? 'untuk mendukung pembangunan kabupaten pasuruan')) !!}</p>
        </div>
    </div>
</section>

{{-- PROGRAM SECTION (Grid 3 Kolom) --}}
{{-- SECTION PROGRAM --}}
<section class="section-program-bps">
    <div class="program-container" style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
        @php
            // Daftar class warna yang tersedia di CSS Anda
            $colors = ['orange', 'green', 'blue', 'purple'];
        @endphp

        @foreach($programs as $prog)
            {{-- Mengambil warna berdasarkan urutan: 0=orange, 1=green, dst. --}}
            @php $currentColor = $colors[$loop->index % count($colors)]; @endphp

            <div class="program-card {{ $currentColor }}" style="flex: 0 0 calc(33.333% - 20px); min-width: 280px; box-sizing: border-box;">
                <img src="{{ asset('storage/' . $prog->foto) }}" alt="{{ $prog->judul }}">
                <h3>{{ $prog->judul }}</h3>
                <p>{{ $prog->deskripsi }}</p>
                
                {{-- Tombol hapus (hanya muncul jika login sebagai admin) --}}
                @auth
                <form action="{{ route('admin.program.destroy', $prog->id) }}" method="POST" style="margin-top: 10px;">
                    @csrf @method('DELETE')
                    <button type="submit" style="background: rgba(255,255,255,0.2); border: 1px solid white; color: white; cursor: pointer; padding: 5px 10px; border-radius: 4px;">Hapus</button>
                </form>
                @endauth
            </div>
        @endforeach
    </div>
</section>

{{-- SECTION SATU DATA UNTUK NEGERI --}}
<section class="hero-alt">
    <div class="hero-alt-container">
        <div class="hero-alt-text">
            <img src="{{ asset('images/bps1.png') }}" alt="Logo BPS" class="hero-alt-logo">
            
            {{-- Ubah bagian ini --}}
            <h1>{!! nl2br(e($settings['profile_footer_title'] ?? 'SATU DATA UNTUK NEGERI')) !!}</h1>
            
            <p>{{ $settings['profile_footer_text'] ?? 'Badan Pusat Statistik Kabupaten Pasuruan berkomitmen...' }}</p>
        </div>
        <div class="hero-alt-image">
            <img src="{{ isset($settings['profile_footer_image']) ? asset('storage/'.$settings['profile_footer_image']) : 'https://via.placeholder.com/800x600' }}" alt="Kegiatan BPS">
        </div>
    </div>
</section>

<div class="modal" id="contactModal">
    <div class="modal-content">
        <h3>Kontak Resmi BPS</h3>
        <p>Email: <strong>bps3514@bps.go.id</strong></p>
        <button onclick="closeModal()">Tutup</button>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // SLIDER
    const slides = document.querySelectorAll(".slide");
    const dots = document.querySelectorAll(".dot");
    let currentIdx = 0;

    function showSlide(n){
        slides.forEach(s => s.classList.remove("active"));
        dots.forEach(d => d.classList.remove("active"));
        slides[n].classList.add("active");
        dots[n].classList.add("active");
        currentIdx = n;
    }

    dots.forEach(d => {
        d.onclick = () => showSlide(parseInt(d.dataset.slide));
    });

    setInterval(() => {
        currentIdx = (currentIdx + 1) % slides.length;
        showSlide(currentIdx);
    }, 5000);

    // MODAL
    function openModal() { document.getElementById('contactModal').style.display = 'flex'; }
    function closeModal() { document.getElementById('contactModal').style.display = 'none'; }

    // HORIZONTAL SCROLL
    const container = document.getElementById("scrollContainer");
    container.addEventListener("wheel", (evt) => {
        if (Math.abs(evt.deltaY) > Math.abs(evt.deltaX)) {
            evt.preventDefault();
            container.scrollLeft += evt.deltaY;
        }
    });
</script>
@endsection