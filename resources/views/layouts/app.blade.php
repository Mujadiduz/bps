<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BPS Kabupaten Pasuruan')</title>

    <style>
        /* ================== PALET WARNA BPS ================== */
        :root{
            --bps-blue:#0093DD;
            --bps-blue-dark:#0077B6;
            --bps-green:#76B82A;
            --bps-orange:#F3921E;
            --dark:#020617;
            --dark-soft:#0f172a;
            --text-main:#e5e7eb;
            --text-soft:#94a3b8;
        }

        *{ margin:0; padding:0; box-sizing:border-box; font-family:"Segoe UI",sans-serif; }
        body{ background:var(--dark); color:var(--text-main); }

        /* NAVBAR */
       /* NAVBAR BPS IMAGE STYLE */
.navbar-bps{
    position:fixed;
    top:10px;
    width:100%;
    z-index:1000;
    display:flex;
    justify-content:center;
}

.navbar-inner{
    width:95%;
    max-width:1400px;
    background:linear-gradient(90deg,#00a8e8,#f8fafc);
    border-radius:20px;
    padding:14px 24px;
    display:flex;
    align-items:center;
    gap:20px;
    box-shadow:0 10px 30px rgba(0,0,0,.25);
}

/* LEFT */
.navbar-left{
    display:flex;
    align-items:center;
    gap:12px;
    color:white;
    font-weight:700;
    line-height:1.1;
}

.navbar-left img{
    width:46px;
}

.navbar-left small{
    font-weight:500;
    font-size:12px;
}

/* SEARCH */
.navbar-search{
    flex:1;
    position:relative;
}

.navbar-search input{
    width:100%;
    padding:12px 45px 12px 18px;
    border-radius:30px;
    border:none;
    outline:none;
    font-size:14px;
}

.search-icon{
    position:absolute;
    right:16px;
    top:50%;
    transform:translateY(-50%);
    opacity:.6;
}

/* RIGHT */
.navbar-right{
    display:flex;
    gap:14px;
}

.navbar-right img{
    height:38px;
    object-fit:contain;
}

/* SEARCH + LOGO WRAP */
.navbar-search-wrap{
    flex:1;
    display:flex;
    align-items:center;
    gap:16px;
}

/* SEARCH */
.navbar-search{
    flex:1;
    position:relative;
}

.navbar-search input{
    width:100%;
    padding:12px 45px 12px 18px;
    border-radius:30px;
    border:none;
    outline:none;
    font-size:14px;
}

.search-icon{
    position:absolute;
    right:16px;
    top:50%;
    transform:translateY(-50%);
    opacity:.6;
}

.search-icon::before{
    content:"🔍";
}

/* LOGO BESIDE SEARCH */
.navbar-logos{
    display:flex;
    align-items:center;
    gap:10px;
}

.navbar-logos img{
    height:60px;
    object-fit:contain;
}



        /* HERO SLIDER
        .hero-slider{ margin-top:70px; height:100vh; position:relative; overflow:hidden; }
        .slide{ position:absolute; inset:0; background-size:cover; background-position:center; opacity:0; transition:opacity 1s; }
        .slide::before{ content:""; position:absolute; inset:0; background:linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.8)); }
        .slide.active{ opacity:1 }
        .slider-dots{ position:absolute; bottom:30px; left:50%; transform:translateX(-50%); display:flex; gap:10px; }
        .dot{ width:12px; height:12px; border-radius:50%; background:rgba(255,255,255,.4); cursor:pointer; }
        .dot.active{ background:var(--bps-orange); } */

        /* HERO IMAGE (NO SLIDER) */
        .hero-image{
            margin-top:70px;
            height:100vh;
            position:relative;
            overflow:hidden;
        }

        .hero-bg{
            position:absolute;
            inset:0;
            background-size:cover;
            background-position:center;
        }

        .hero-bg::before{
            content:"";
            position:absolute;
            inset:0;
            background:linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.8));
        }

        .hero-split{
    min-height:100vh;
    background-size:cover;
    background-position:center;
    position:relative;
    padding:140px 0 80px;
}

.hero-overlay{
    position:absolute;
    inset:0;
    background:rgba(0,0,0,.45);
}

.hero-container{
    position:relative;
    z-index:2;
    width:95%;
    max-width:1300px;
    margin:auto;
    display:flex;
    align-items:center;
    gap:50px;
}

/* TEXT */
.hero-text{
    flex:1;
    color:white;
}

.hero-text h1{
    font-size:30px;
    font-weight:800;
    margin-bottom:18px;
}

.hero-text p{
    font-size:25px;
    line-height:1.7;
}

/* FOTO */
.hero-photo{
    flex:1;
    position: relative;
    overflow: hidden;
}

/* Membuat lapisan di atas foto */
.hero-photo::after {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.4); /* Warna hitam transparan 40% */
    border-radius: 18px;
    pointer-events: none; /* Agar klik tetap tembus ke gambar jika perlu */
    transition: background 0.4s ease;
}

.hero-photo img {
    width: 100%;
    border-radius: 18px;
    opacity: 0.6;
    transition: opacity 0.3s ease; /* Biar transisinya halus */
    filter: brightness(0.8);
}

.hero-photo:hover::after {
    background: rgba(0, 0, 0, 0); /* Menjadi bening total */
}

.hero-photo:hover img {
    opacity: 1;          /* Jadi tajam */
    filter: brightness(1.2); /* Menambah kecerahan (1.0 itu normal, 1.2 berarti +20%) */
    transform: scale(1.02);  /* Opsional: sedikit zoom agar lebih interaktif */
}

.section-statistik{
    background:#ffffff;
    padding:40px 0;
    text-align:center;
}

.statistik-title{
    font-size:28px;
    text-align: center;
    font-weight:800;
    color:#f59e0b; /* kuning BPS */
    letter-spacing:1px;
    line-height:1.3;
}

.statistik-light{
    font-weight:400; /* tidak bold */
}

/* RESPONSIVE */
@media (max-width:768px){
    .statistik-title{
        font-size:20px;
    }
}


/* DIAGRAM SECTION */
.diagram-section{
    background: linear-gradient(135deg, #0093DD, #0077B6);
    padding:50px 0;
}

.diagram-container{
    display:flex;
    justify-content:space-between;
    gap:20px;
    width:95%;
    max-width:1300px;
    margin:auto;
    flex-wrap:wrap;
}

.diagram-card{
    flex:1 1 calc(33.333% - 20px);
    text-align:center;
}

.diagram-card img{
    width:100%;
    height:auto;
    border-radius:10px;
    box-shadow:0 10px 25px rgba(0,0,0,.15);
    object-fit:cover;
}

/* RESPONSIVE HP */
@media (max-width:768px){
    .diagram-card{
        flex:1 1 100%;
    }
}

.section-target-pss{
    background:#f59e0b; /* kuning BPS */
    padding:18px 0;
}

.target-pss-title{
    color:#ffffff;
    font-size:26px;
    font-weight:800;
    letter-spacing:1px;
    margin:0;
    text-align:left; /* RATA KIRI */
}

/* RESPONSIVE */
@media (max-width:768px){
    .target-pss-title{
        font-size:20px;
        line-height:1.4;
    }
}

.section-checklist-pss{
    background:#ffffff;
    padding:40px 0;
}

.checklist-pss{
    list-style:none;
    padding:0;
    margin:0;
    max-width:800px;
}

.checklist-pss li{
    position:relative;
    padding-left:42px;
    margin-bottom:18px;
    font-size:18px;
    color:#1f2937;
    line-height:1.5;
    font-weight:500;
}

/* ICON CHECK */
.checklist-pss li::before{
    content:"✔";
    position:absolute;
    left:0;
    top:2px;
    width:26px;
    height:26px;
    border-radius:50%;
    background:#f59e0b; /* kuning BPS */
    color:#fff;
    font-size:16px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:700;
}

/* ================== RESPONSIVE HP ================== */
@media (max-width: 768px){

    /* NAVBAR */
    .navbar-inner{
        flex-direction: column;
        gap:12px;
        padding:14px 16px;
    }

    .navbar-left{
        justify-content:center;
        text-align:center;
    }

    .navbar-left img{
        width:40px;
    }

    .navbar-search-wrap{
        flex-direction:column;
        width:100%;
        gap:10px;
    }

    .navbar-search input{
        font-size:13px;
        padding:10px 40px 10px 14px;
    }

    .navbar-logos{
        justify-content:center;
        flex-wrap:wrap;
    }

    .navbar-logos img{
        height:42px;
    }

    /* HERO */
    .hero-container{
        flex-direction:column;
        text-align:center;
        gap:30px;
    }

    .hero-text h1{
        font-size:22px;
        line-height:1.3;
    }

    .hero-text p{
        font-size:16px;
    }

    .hero-photo img{
        max-height:260px;
        object-fit:cover;
    }

    /* STATISTIK */
    .statistik-title{
        font-size:20px;
        line-height:1.3;
    }

    /* TARGET PSS */
    .target-pss-title{
        font-size:18px;
        text-align:center;
    }

    /* CHECKLIST */
    .checklist-pss li{
        font-size:15px;
        padding-left:36px;
    }

    /* TRENDING CARD */
    .news-feed-container{
        height:320px;
    }

    .news-card-trending{
        min-width:220px;
    }

    /* FOOTER */
    .footer-container{
        flex-direction:column;
        text-align:center;
        gap:20px;
    }

    .social-icons{
        justify-content:center;
    }
}

/* ================== DRAWER ================== */
.drawer-toggle{
    display:none;
    position:fixed;
    top:18px;
    left:20px;
    z-index:2000;
    font-size:26px;
    color:white;
    cursor:pointer;
}

.drawer{
    position:fixed;
    top:0;
    left:-280px;
    width:260px;
    height:100vh;
    background:#020617;
    z-index:3000;
    padding:24px;
    transition:.35s ease;
    box-shadow:8px 0 25px rgba(0,0,0,.45);
}

.drawer.active{
    left:0;
}

.drawer-header{
    text-align:center;
    margin-bottom:30px;
}

.drawer-header img{
    width:70px;
    margin-bottom:10px;
}

.drawer-header h3{
    font-size:15px;
    color:#fff;
}

.drawer-menu{
    display:flex;
    flex-direction:column;
    gap:16px;
}

.drawer-menu a{
    text-decoration:none;
    color:#e5e7eb;
    font-weight:600;
    padding:12px 16px;
    border-radius:10px;
    background:rgba(255,255,255,.05);
}

.drawer-menu a:hover{
    background:#f59e0b;
    color:#000;
}

.drawer-overlay{
    position:fixed;
    inset:0;
    background:rgba(0,0,0,.55);
    z-index:2500;
    display:none;
}

.drawer-overlay.active{
    display:block;
}

/* MOBILE ONLY */
@media (max-width:768px){
    .drawer-toggle{
        display:block;
    }
}

@media (min-width:769px){
    .drawer-toggle{
        display:block;
    }
}

.hero-photo-profile {
    max-width: 600px;   /* atur ukuran container */
    margin: 0 auto;     /* biar center */
}

.hero-photo-profile img {
    width: 100%;
    height: auto;
    border-radius: 10px; /* opsional, biar halus */
}

.hero-text-profile {
    text-align: center;
}

.hero-profile {
    min-height: 95vh;   /* index biasanya 100vh */
    padding: 80px 0;    /* biar tidak terlalu tinggi */
}

.hero-profile .hero-container {
    padding-top: 60px;   /* geser ke bawah */
}

.hero-profile{
    background: linear-gradient(135deg, #0093DD, #0077B6);
    min-height: 70vh;              /* lebih pendek dari index */
    display: flex;
    align-items: center;           /* konten turun ke tengah */
    padding: 120px 0 80px;
}

.hero-profile .hero-overlay{
    background: rgba(0,0,0,0.15);
}

.hero-photo-profile{
    margin-left: -40px; /* geser ke kiri */
}

.section-program-bps{
    background:#f8fafc;
    padding:70px 20px;
}

.program-container{
    max-width:1200px;
    margin:auto;
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:24px;
}

.program-card{
    color:#fff;
    padding:28px 22px;
    border-radius:22px;
    text-align:center;
    box-shadow:0 15px 35px rgba(0,0,0,.15);
    transition:.3s ease;
}

.program-card:hover{
    transform:translateY(-8px);
}

/* IMAGE */
.program-card img{
    width:140px;
    margin-bottom:18px;
}

/* TITLE */
.program-card h3{
    font-size:18px;
    font-weight:800;
    margin-bottom:10px;
}

/* TEXT */
.program-card p{
    font-size:14px;
    line-height:1.6;
}

/* WARNA */
.program-card.orange{
    background:linear-gradient(135deg,#f97316,#fb923c);
}

.program-card.green{
    background:linear-gradient(135deg,#22c55e,#4ade80);
}

.program-card.blue{
    background:linear-gradient(135deg,#0ea5e9,#38bdf8);
}

.program-card.purple{
    background:linear-gradient(135deg,#8b5cf6,#a78bfa);
}

@media (max-width:768px){
    .program-container{
        grid-template-columns:1fr;
    }

    .program-card img{
        width:70px;
    }
}

/* ================== HERO ALT (STYLE BARU) ================== */
.hero-alt{
    background:#f8fafc;
    padding:120px 0 90px;
    position:relative;
}

.hero-alt::before{
    content:"";
    position:absolute;
    inset:0;
    background:
        linear-gradient(120deg, rgba(0,147,221,.12) 0%, transparent 60%);
}

.hero-alt-container{
    position:relative;
    z-index:2;
    width:95%;
    max-width:1300px;
    margin:auto;
    display:flex;
    align-items:center;
    gap:60px;
}

/* TEXT */
.hero-alt-text{
    flex:1;
    color:#020617;
}

.hero-alt-logo{
    width:120px;
    margin-bottom:18px;
}

.hero-alt-text h1{
    font-size:38px;
    font-weight:900;
    line-height:1.2;
    color:var(--bps-blue-dark);
    margin-bottom:20px;
}

.hero-alt-text p{
    font-size:18px;
    line-height:1.7;
    color:#334155;
    max-width:520px;
}

/* IMAGE */
.hero-alt-image{
    flex:1;
    position:relative;
}

.hero-alt-image img{
    width:100%;
    border-radius:22px;
    box-shadow:0 25px 50px rgba(0,0,0,.25);
    object-fit:cover;
}

/* ================== RESPONSIVE ================== */
@media (max-width:768px){
    .hero-alt{
        padding:90px 0 70px;
    }

    .hero-alt-container{
        flex-direction:column-reverse;
        text-align:center;
        gap:35px;
    }

    .hero-alt-text p{
        max-width:100%;
        font-size:16px;
    }

    .hero-alt-text h1{
        font-size:26px;
    }

    .hero-alt-logo{
        width:90px;
        margin:auto;
        margin-bottom:14px;
    }
}

/* ================== FOOTER BARU (CONTACT PERSON STYLE) ================== */
.footer-bps {
    background: #e2efff; /* Warna latar biru sangat muda sesuai gambar */
    padding: 40px 0 20px;
    color: #d97706; /* Warna teks oranye gelap */
}

.footer-title-main {
    text-align: center;
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 30px;
    color: #F3921E;
}

.footer-container {
    max-width: 1000px;
    margin: auto;
    display: grid;
    grid-template-columns: 1fr 1fr; /* Membagi dua kolom */
    gap: 20px 60px;
    padding: 0 20px;
}

.footer-item {
    display: flex;
    align-items: center;
    gap: 15px;
    font-size: 16px;
    font-weight: 500;
}

.footer-item img {
    width: 28px;
    height: 28px;
    object-fit: contain;
}

.footer-item a {
    color: #d97706;
    text-decoration: none;
    transition: 0.3s;
}

.footer-item a:hover {
    text-decoration: underline;
}

.footer-bottom {
    text-align: center;
    margin-top: 40px;
    padding-top: 20px;
    border-top: 1px solid rgba(217, 119, 6, 0.2);
    font-size: 13px;
    color: #64748b;
}

/* Responsive Footer */
@media (max-width: 768px) {
    .footer-container {
        grid-template-columns: 1fr; /* Menjadi satu kolom di HP */
        gap: 15px;
    }
}



        /* SECTION & CARDS */
        section{ padding:90px 20px; }
        .container{ max-width:1200px; margin:auto; }
        .section-title{ text-align:center; font-size:28px; margin-bottom:50px; color:var(--bps-orange); }
        .section-blue{ background:linear-gradient(180deg, rgba(0,147,221,.45), rgba(15,23,42,1)); }
        .section-green{ background:linear-gradient(180deg, rgba(118,184,42,.45), rgba(15,23,42,1)); }
        .section-dark{ background:linear-gradient(180deg, #003554, #020617); }
        .grid{ display:grid; grid-template-columns:repeat(auto-fit,minmax(260px,1fr)); gap:25px; }

        /* HUMAS / NEWS CARD */
        .humas-grid{ display:grid; grid-template-columns:repeat(3, 1fr); gap:30px; }
        .humas-card{ background:rgba(2,6,23,.75); border-radius:22px; overflow:hidden; border:1px solid rgba(255,255,255,.15); backdrop-filter:blur(8px); transition:.35s ease; display:flex; flex-direction:column; }
        .humas-card:hover{ transform:translateY(-8px); border-color:var(--bps-green); box-shadow:0 20px 45px rgba(0,0,0,.45); }
        .humas-card img{ width:100%; height:200px; object-fit:cover; }
        .humas-content{ padding:20px; text-align:left; }
        .humas-content .date{ font-size:12px; color:var(--text-soft); display:block; margin-bottom:8px; }
        .humas-content h3{ color:var(--bps-green); font-size:17px; margin-bottom:8px; }
        .humas-content p{ font-size:14px; line-height:1.6; color:var(--text-main); }

        /* TRENDING TOPIC */
        .news-feed-container { width: 100%; height: 450px; overflow-x: auto; overflow-y: hidden; scroll-behavior: smooth; display: flex; align-items: center; padding: 20px 0; gap: 15px; cursor: grab; }
        .news-feed-container.active { cursor: grabbing; }
        .news-card-trending { position: relative; height: 100%; border-radius: 16px; overflow: hidden; flex-shrink: 0; flex-grow: 1; flex-basis: 250px; min-width: 250px; transition: all 0.5s; border: 1px solid rgba(255,255,255,0.1); }
        @media (min-width: 768px) { .news-card-trending:hover { flex-basis: 500px; min-width: 500px; } }
        .news-card-trending img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s; }
        .overlay-trending { position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, transparent 60%); }
        .content-trending { position: absolute; bottom: 0; left: 0; width: 100%; padding: 25px; text-align: left; }
        .content-trending h2 { font-size: 1.2rem; color: white; }
        .content-trending p { font-size: 0.9rem; color: #ccc; opacity: 0; max-height: 0; transition: 0.3s; }
        .news-card-trending:hover p { opacity: 1; max-height: 100px; }

        /* CONTACT LINKS */
        .contact-icons{ display:grid; grid-template-columns:repeat(auto-fit, minmax(140px, 1fr)); gap:20px; justify-items:center; }
        .contact-item{ width:100%; max-width:150px; padding:16px 10px; border-radius:16px; border:1px solid rgba(255,255,255,.15); background:rgba(2,6,23,.7); text-align:center; text-decoration:none; color:var(--text-main); transition:.3s; display:flex; flex-direction:column; align-items:center; gap:8px; cursor: pointer;}
        .contact-item img{ width:32px !important; height:32px !important; }
        .contact-item:hover{ transform:translateY(-6px); border-color:var(--bps-orange); }
        .icon-big{ transform:scale(1.35); }

        /* FOOTER */
        .footer-bps{ background:linear-gradient(180deg,#003554,#020617); }
        .footer-container{ max-width:1200px; margin:auto; padding:40px 20px; display:flex; flex-wrap:wrap; justify-content:space-between; gap:30px; }
        .social-icons{ display:flex; gap:12px; }
        .social-icons a{ width:40px; height:40px; border-radius:50%; background:rgba(0,147,221,.35); display:flex; align-items:center; justify-content:center; }
        .footer-bottom{ text-align:center; padding:15px; border-top:1px solid rgba(255,255,255,0.1); font-size:13px; color:var(--text-soft); }

        /* MODAL */
        .modal{ position:fixed; inset:0; background:rgba(0,0,0,.65); display:none; align-items:center; justify-content:center; z-index:9999; }
        .modal-content{ background:#020617; padding:30px; border-radius:20px; text-align:center; border:1px solid rgba(255,255,255,.2); max-width:400px; }
        button{ padding:12px 25px; border-radius:25px; border:none; background:var(--bps-orange); font-weight:bold; cursor:pointer; }
    </style>
</head>
<body>
    <!-- TOGGLE DRAWER BUTTON (MOBILE) -->
<div class="drawer-toggle" onclick="openDrawer()">☰</div>

<!-- DRAWER -->
<div class="drawer-overlay" onclick="closeDrawer()"></div>

<aside class="drawer">
    <div class="drawer-header">
        <img src="{{ asset('images/bps.png') }}" alt="BPS">
        <h3>BPS Kabupaten Pasuruan</h3>
    </div>

    <nav class="drawer-menu">
    <a href="{{ route('home') }}" onclick="closeDrawer()">Beranda</a>
    <a href="{{ route('profile') }}" onclick="closeDrawer()">Profile</a>
    <a href="{{ route('links') }}" onclick="closeDrawer()">Kumpulan Link</a>
</nav>

</aside>


    <nav class="navbar-bps">
        <div class="navbar-inner">
            <!-- LEFT : LOGO -->
            <div class="navbar-left">
                <img src="{{ asset('images/bps.png') }}" alt="BPS">
                <span>
                    BADAN PUSAT STATISTIK<br>
                    <small>KABUPATEN PASURUAN</small>
                </span>
            </div>

            <!-- CENTER : SEARCH + LOGO -->
<div class="navbar-search-wrap">

    <div class="navbar-search">
        <input type="text" placeholder="Search...">
        <span class="search-icon"></span>
    </div>

    <div class="navbar-logos">
        <img src="{{ asset('images/bps1.png') }}" alt="bps1">
        <img src="{{ asset('images/bps2.png') }}" alt="bps2">
        <img src="{{ asset('images/bps3.png') }}" alt="bps3">
    </div>

</div>

    </nav>

    <main>
        @yield('content')
    </main>

    </main>

    {{-- Hanya tampilkan footer jika BUKAN di halaman profile --}}
   @if(!Route::is('profile') && !Route::is('home'))
<footer class="footer-bps">
    <h2 class="footer-title-main">Contact Person</h2>
    
    <div class="footer-container">
        <div class="footer-left-group">
            <div class="footer-item">
                <span>🌐</span> <a href="https://pasuruankab.bps.go.id" target="_blank">pasuruankab.bps.go.id</a>
            </div>
            <div class="footer-item" style="margin-top:15px;">
                <span>🎧</span> 
                <a href="https://halopst.web.bps.go.id" target="_blank">halopst.web.bps.go.id</a>
            </div>
            <div class="footer-item" style="margin-top:15px;">
                <span>📞</span> 
                <a href="https://wa.me/6281290003514" target="_blank">0812-9000-3514</a>
            </div>
        </div>

        <div class="footer-right-group">
            <div class="footer-item">
                <span>✉️</span> 
                <a href="mailto:bps3514@bps.go.id">bps3514@bps.go.id</a>
            </div>
            <div class="footer-item" style="margin-top:15px;">
                <span>📍</span> 
                <p>Kantor: Jl. Sultan Agung No.42, Pasuruan, Jawa Timur</p>
            </div>
            <div class="footer-item" style="margin-top:15px;">
                <span>📞</span> 
                <p>(0343) 423420</p>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        © {{ date('Y') }} Badan Pusat Statistik Kabupaten Pasuruan
    </div>
</footer>
@endif

    @yield('scripts')

    @yield('scripts')

    <script>
    function openDrawer(){
        document.querySelector('.drawer').classList.add('active');
        document.querySelector('.drawer-overlay').classList.add('active');
    }

    function closeDrawer(){
        document.querySelector('.drawer').classList.remove('active');
        document.querySelector('.drawer-overlay').classList.remove('active');
    }
</script>


</body>
</html>