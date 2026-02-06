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
        nav{ position:fixed; top:0; width:100%; background:linear-gradient(90deg,var(--bps-blue-dark),var(--bps-blue)); z-index:1000; }
        .nav-container{ max-width:1200px; margin:auto; padding:15px 20px; display:flex; justify-content:space-between; align-items:center; }
        .logo{ display:flex; align-items:center; gap:10px; color:white; font-weight:bold; font-size:18px; text-decoration:none; }
        .logo img{ width:34px; }
        .nav-links{ list-style:none; display:flex; gap:20px; }
        .nav-links a{ color:white; text-decoration:none; font-size:14px; opacity:.85; }
        .nav-links a:hover, .nav-links a.active{ opacity:1; color:var(--bps-orange); font-weight:600; }

        /* HERO SLIDER */
        .hero-slider{ margin-top:70px; height:100vh; position:relative; overflow:hidden; }
        .slide{ position:absolute; inset:0; background-size:cover; background-position:center; opacity:0; transition:opacity 1s; }
        .slide::before{ content:""; position:absolute; inset:0; background:linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.8)); }
        .slide.active{ opacity:1 }
        .slider-dots{ position:absolute; bottom:30px; left:50%; transform:translateX(-50%); display:flex; gap:10px; }
        .dot{ width:12px; height:12px; border-radius:50%; background:rgba(255,255,255,.4); cursor:pointer; }
        .dot.active{ background:var(--bps-orange); }

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

    <nav>
        <div class="nav-container">
            <a href="#" class="logo">
                <img src="{{ asset('images/bps.png') }}">
                <span>BPS Kabupaten Pasuruan</span>
            </a>
            <ul class="nav-links">
                <li><a href="#home" class="active">Beranda</a></li>
                <li><a href="#fungsi">Pengertian</a></li>
                <li><a href="#hirarki">Berita</a></li>
                <li><a href="#kontak">Link</a></li>
            </ul>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer-bps">
        <div class="footer-container">
            <div class="footer-left">
                <h3>Badan Pusat Statistik<br>Kabupaten Pasuruan</h3>
                <p>Jl. Sultan Agung No.42<br>Email: bps3514@bps.go.id</p>
            </div>
            <div class="footer-center"><img src="{{ asset('images/bps.png') }}" width="100"></div>
            <div class="footer-right">
                <p class="footer-title">Media Sosial</p>
                <div class="social-icons">
                    <a href="#"><img src="{{ asset('images/twitter.png') }}" width="20"></a>
                    <a href="#"><img src="{{ asset('images/instagram.png') }}" width="20"></a>
                    <a href="#"><img src="{{ asset('images/facebook.png') }}" width="20"></a>
                    <a href="#"><img src="{{ asset('images/youtube.png') }}" width="20"></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">© {{ date('Y') }} BPS Kabupaten Pasuruan</div>
    </footer>

    @yield('scripts')

</body>
</html>