@extends('layouts.app')

@section('title', 'Kumpulan Link | BPS Kabupaten Pasuruan')

@section('content')
<style>
    .links-page {
    padding: 140px 20px 80px;
    min-height: 100vh;
    /* Gradient Hijau Tua ke Hitam */
    background: radial-gradient(circle at top left, #064e3b, #022c22), 
                linear-gradient(135deg, #022c22 0%, #000000 100%);
    background-attachment: fixed;
    display: flex;
    flex-direction: column;
    align-items: center;
}

    .links-container {
        width: 100%;
        max-width: 700px;
    }

    .link-group-title {
        color: #fff;
        text-align: center;
        font-weight: 800;
        font-size: 28px;
        margin-bottom: 30px;
        letter-spacing: 1px;
        text-transform: uppercase;
        /* Memberikan efek glow tipis pada teks */
        text-shadow: 0 0 20px rgba(255, 165, 0, 0.3);
    }

    /* Span untuk warna orange khas BPS pada judul */
    .title-highlight {
        color: var(--bps-orange, #f59e0b);
    }

    .link-section-label {
        color: #fff;
        font-size: 18px;
        font-weight: 600;
        margin: 40px 0 20px;
        border-left: 4px solid var(--bps-blue, #0093dd);
        padding-left: 15px;
        opacity: 0.9;
    }

    .grid-links {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }

    .link-item {
        /* Glassmorphism effect */
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 18px;
        border-radius: 12px;
        text-decoration: none;
        color: rgba(255, 255, 255, 0.9);
        text-align: center;
        font-weight: 600;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: flex;
        align-items: center;
        justify-content: center;
    }

   .link-item:hover {
    background: #10b981; /* Warna hijau emerald terang */
    color: #fff;
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
}

    .full-link {
        grid-column: span 2;
    }

    @media (max-width: 600px) {
        .grid-links {
            grid-template-columns: 1fr;
        }
        .full-link {
            grid-column: span 1;
        }
        .link-group-title {
            font-size: 22px;
        }
    }
</style>

<div class="links-page">
    <div class="links-container">
        <h1 class="link-group-title">KUMPULAN LINK WEBSITE<br>PSS & EPSS</h1>

        {{-- SECTION 1 --}}
        <div class="grid-links">
            <a href="https://www.bps.go.id/id" target="_blank" rel="noopener noreferrer" class="link-item">WEBSITE BPS</a>
            <a href=" http://www.pasuruankab.bps.go.id/" target="_blank" rel="noopener noreferrer" class="link-item">WEBSITE BPS KAB.PASURUAN</a>
            <a href="https://www.romantik.web.bps.go.id/" target="_blank" rel="noopener noreferrer" class="link-item">ROMANTIK</a>
            <a href="https://indah.bps.go.id/" target="_blank" rel="noopener noreferrer" class="link-item">METADATA</a>
            <a href="http://sirusa.web.go.id/" target="_blank" rel="noopener noreferrer" class="link-item">SIRUSA</a>
            <a href="https://data.go.id/" target="_blank" rel="noopener noreferrer" class="link-item">SATU DATA INDONESIA</a>
            <a href="https://silastik.bps.go.id/" target="_blank" rel="noopener noreferrer" class="link-item">SILASTIK</a>
            <a href="https://halopst.web.bps.go.id/?mfd=3500" target="_blank" rel="noopener noreferrer" class="link-item">HALO PST</a>
        </div>

        {{-- SECTION 2 --}}
        <h2 class="link-section-label">LINK TARGET PSS & EPSS</h2>
        <div class="grid-links">
            <a href="https://majapah.it/" target="_blank" rel="noopener noreferrer" class="link-item">MAJAPAHIT</a>
            <a href=" https://webapps.bps.go.id/rujukan/pembinaan/public/" target="_blank" rel="noopener noreferrer" class="link-item">PSS</a>
            <a href="https://romantik.web.bps.go.id/webadmin" target="_blank" rel="noopener noreferrer" class="link-item">ROMANTIK ADMIN</a>
            <a href="https://pembinaansektoral3514.bps.go.id/epss" target="_blank" rel="noopener noreferrer" class="link-item">EPSS</a>
        </div>

        {{-- SECTION 3 (FULL WIDTH BERDASARKAN SKETSA) --}}
        <h2 class="link-section-label">PEMBINAAN & KELENGKAPAN</h2>
        <div class="grid-links">
            <a href="https://pembinaansektoral3514.bps.go.id/epss" target="_blank" rel="noopener noreferrer" class="link-item full-link">LAKUS PEMBINAAN PSS 2026</a>
            <a href="https://pembinaansektoral3514.bps.go.id/pss" target="_blank" rel="noopener noreferrer" class="link-item full-link">KELENGKAPAN PSS</a>
            <a href="https://pembinaansektoral3514.bps.go.id/epss" target="_blank" rel="noopener noreferrer" class="link-item full-link">KELENGKAPAN EPSS</a>
            <a href="https://pembinaansektoral3514.bps.go.id/target" target="_blank" rel="noopener noreferrer" class="link-item full-link">TARGET BULANAN</a>
            <a href="https://pembinaansektoral3514.bps.go.id/target" target="_blank" rel="noopener noreferrer" class="link-item full-link">REALISASI BULANAN</a>
        </div>
    </div>
</div>
@endsection