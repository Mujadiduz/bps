@extends('layouts.app')

@section('title', 'Beranda | BPS Kabupaten Pasuruan')

@section('content')
<section class="hero-slider" id="home">
    <div class="slide active" style="background-image:url('{{ asset('images/download.jpg') }}')"></div>
    <div class="slide" style="background-image:url('{{ asset('images/test2.jpg') }}')"></div>
    <div class="slide" style="background-image:url('{{ asset('images/test3.jpg') }}')"></div>

    <div class="slider-dots">
        <span class="dot active" data-slide="0"></span>
        <span class="dot" data-slide="1"></span>
        <span class="dot" data-slide="2"></span>
    </div>
</section>

<section id="fungsi" class="section-blue">
    <div class="container">
        <h2 class="section-title" style="font-size: 22px;">TRENDING TOPIC</h2>
        <div class="news-feed-container" id="scrollContainer">
            @php
                $trending = [
                    ['title' => 'Gaming Industry 2026', 'desc' => 'Konsol generasi baru rilis bulan depan.', 'img' => 'https://images.unsplash.com/photo-1511512578047-dfb367046420?w=600'],
                    ['title' => 'Artikel Coding', 'desc' => 'Tutorial Python untuk pemula.', 'img' => 'https://images.unsplash.com/photo-1493612276216-ee3925520721?w=600'],
                    ['title' => 'Supercar Listrik', 'desc' => 'Kecepatan 0-100 hanya 1.9 detik.', 'img' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=600'],
                    ['title' => 'Cuaca Ekstrem', 'desc' => 'Badai salju melanda Eropa utara.', 'img' => 'https://images.unsplash.com/photo-1504608524841-42fe6f032b4b?w=600'],
                ];
            @endphp

            @foreach($trending as $item)
            <div class="news-card-trending">
                <img src="{{ $item['img'] }}" alt="">
                <div class="overlay-trending"></div>
                <div class="content-trending">
                    <h2>{{ $item['title'] }}</h2>
                    <p>{{ $item['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="hirarki" class="section-green">
    <div class="container">
        <h2 class="section-title">Berita Terkini</h2>
        <div class="grid humas-grid">
            <div class="humas-card">
                <img src="{{ asset('images/test2.jpg') }}" alt="Kegiatan">
                <div class="humas-content">
                    <span class="date">12 Januari 2026</span>
                    <h3>Sosialisasi Statistik Sektoral</h3>
                    <p>Kegiatan sosialisasi statistik sektoral guna meningkatkan kualitas data.</p>
                </div>
            </div>
            <div class="humas-card">
                <img src="{{ asset('images/test2.jpg') }}" alt="Rapat">
                <div class="humas-content">
                    <span class="date">05 Januari 2026</span>
                    <h3>Rapat Koordinasi Data</h3>
                    <p>Rapat koordinasi internal dalam rangka penyusunan publikasi statistik daerah.</p>
                </div>
            </div>
            <div class="humas-card">
                <img src="{{ asset('images/test2.jpg') }}" alt="Pelatihan">
                <div class="humas-content">
                    <span class="date">20 Desember 2025</span>
                    <h3>Pelatihan Pengolahan Data</h3>
                    <p>Pelatihan pengolahan dan analisis data statistik bagi pegawai.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="kontak" class="section-dark">
    <div class="container">
        <h2 class="section-title">Kumpulan Link BPS</h2>
        <div class="contact-icons">
            <a href="#" class="contact-item" data-tooltip="Rekomendasi"><img src="{{ asset('images/romantik.png') }}"><span>Rekomendasi</span></a>
            <a href="#" class="contact-item" data-tooltip="Sirusa"><img src="{{ asset('images/sirusa.png') }}" class="icon-big"><span>Sirusa</span></a>
            <a href="#" class="contact-item" data-tooltip="Indah Hub"><img src="{{ asset('images/indah.png') }}" class="icon-big"><span>Indah Hub</span></a>
            <button class="contact-item" onclick="openModal()"><img src="{{ asset('images/spbe.png') }}"><span>Website Pembinaan</span></button>
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