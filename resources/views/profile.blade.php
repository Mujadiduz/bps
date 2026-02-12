@extends('layouts.app')

@section('title', 'Beranda | BPS Kabupaten Pasuruan')

@section('content')
<section class="hero-split hero-profile" id="home">
    <div class="hero-overlay"></div>

    <div class="hero-container">

        <div class="hero-photo-profile">
            <img src="https://i0.wp.com/abouttng.com/wp-content/uploads/2015/12/Foto-bersama.jpg?resize=1024%2C634&ssl=1" alt="Foto Bersama">
        </div>
       <div class="hero-text-profile">
    <img src="{{ asset('images/bps1.png') }}" alt="Logo BPS" class="hero-logo">

    <h1>
        SATU DATA, BANYAK MAKNA<br>
        MENGHADIRKAN DATA AKURAT<br>
        DAN TERPERCAYA
    </h1>

    <p>
        untuk mendukung<br>
        pembangunan<br>
        kabupaten pasuruan
    </p>
</div>


    </div>
</section>

<section class="section-program-bps">
    <div class="program-container">

        <div class="program-card orange">
            <img src="{{ asset('images/download.jpg') }}" alt="Internalisasi">
            <h3>Internalisasi</h3>
            <p>
                Penerapan statistik dalam
                penyelenggaraan statistik
                sektoral di daerahajldsjfajfd
                ajlkdfjlajfd
                alsjdfjalkdfa
                aldfjasalsdlfajfldajlfjlkafj;lajfla
                a;lkdfjalkjfldajlfajd
                a;lkdfjalfdjlajfda
                lkajlfdjlajflksajflajfdjklajlfsajlf
            </p>
        </div>

        <div class="program-card green">
            <img src="{{ asset('images/download.jpg') }}" alt="Koordinasi">
            <h3>Koordinasi Sektoral</h3>
            <p>
                Upaya penyelarasan
                penyelenggaraan statistik
                sektoral agar terintegrasi
            </p>
        </div>

        <div class="program-card blue">
            <img src="{{ asset('images/download.jpg') }}" alt="Romantik">
            <h3>Romantik</h3>
            <p>
                Rekomendasi kegiatan statistik
                melalui pembinaan statistik
                sektoral
            </p>
        </div>

        <div class="program-card purple">
            <img src="{{ asset('images/download.jpg') }}" alt="Evaluasi">
            <h3>Evaluasi</h3>
            <p>
                Penilaian hasil pembinaan
                statistik sektoral di OPD
            </p>
        </div>

    </div>
</section>



{{-- <section id="hirarki" class="section-green">
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
</section> --}}

{{-- <section id="kontak" class="section-dark">
    <div class="container">
        <h2 class="section-title">Kumpulan Link BPS</h2>
        <div class="contact-icons">
            <a href="#" class="contact-item" data-tooltip="Rekomendasi"><img src="{{ asset('images/romantik.png') }}"><span>Rekomendasi</span></a>
            <a href="#" class="contact-item" data-tooltip="Sirusa"><img src="{{ asset('images/sirusa.png') }}" class="icon-big"><span>Sirusa</span></a>
            <a href="#" class="contact-item" data-tooltip="Indah Hub"><img src="{{ asset('images/indah.png') }}" class="icon-big"><span>Indah Hub</span></a>
            <button class="contact-item" onclick="openModal()"><img src="{{ asset('images/spbe.png') }}"><span>Website Pembinaan</span></button>
        </div>
    </div>
</section> --}}

<section class="hero-alt" id="hero-alt">
    <div class="hero-alt-container">

        <!-- TEXT -->
        <div class="hero-alt-text">
            <img src="{{ asset('images/bps1.png') }}" alt="Logo BPS" class="hero-alt-logo">

            <h1>
                SATU DATA<br>
                UNTUK NEGERI
            </h1>

            <p>
                Badan Pusat Statistik Kabupaten Pasuruan berkomitmen
                menyediakan data yang akurat, mutakhir, dan terpercaya
                sebagai dasar perencanaan pembangunan daerah.
            </p>
        </div>

        <!-- IMAGE -->
        <div class="hero-alt-image">
            <img src="https://i0.wp.com/abouttng.com/wp-content/uploads/2015/12/Foto-bersama.jpg?resize=1024%2C634&ssl=1"
                 alt="Kegiatan BPS">
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