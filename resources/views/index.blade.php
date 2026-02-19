@extends('layouts.app')

@section('title', 'Beranda | BPS Kabupaten Pasuruan')

@section('content')
{{-- HERO SECTION --}}
<section class="hero-split" id="home"
    style="background-image:url('{{ asset('images/bromo.jpg') }}')">
    <div class="hero-overlay"></div>

    <div class="hero-container">
        <div class="hero-text">
            <h1>{!! $settings['hero_title'] ?? 'SATU DATA, BANYAK MAKNA<br>MENGHADIRKAN DATA AKURAT<br>DAN TERPERCAYA' !!}</h1>
            <p>
                {!! nl2br(e($settings['hero_subtitle'] ?? "untuk mendukung\npembangunan\nkabupaten pasuruan")) !!}
            </p>
        </div>

        <div class="hero-photo">
    @if(isset($settings['hero_image']))
        <img src="{{ asset('storage/' . $settings['hero_image']) }}" alt="Foto Hero BPS">
    @else
        {{-- Gambar default jika admin belum upload --}}
        <img src="https://i0.wp.com/abouttng.com/wp-content/uploads/2015/12/Foto-bersama.jpg?resize=1024%2C634&ssl=1" alt="Foto Bersama">
    @endif
</div>
    </div>
</section>

{{-- SECTION PERKEMBANGAN (Judul) --}}
<section class="section-statistik">
    <div class="container">
        <h2 class="statistik-title">
            <span class="statistik-light">PERKEMBANGAN</span><br>
            PEMBINAAN STATISTIK<br>
            SEKTORAL {{ date('Y') }}
        </h2>
    </div>
</section>

{{-- SECTION DIAGRAM --}}
<section class="diagram-section" style="padding: 50px 0;">
    <div class="container">
        <div class="diagram-flex-container" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px;">
            @forelse($diagrams as $diagram)
                <div class="diagram-card" style="flex: 0 0 calc(33.333% - 30px); min-width: 300px; box-sizing: border-box;">
                    <div style="background: white; padding: 15px; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.05); transition: 0.3s;">
                        <img src="{{ asset('storage/' . $diagram->foto) }}" alt="Diagram Perkembangan" 
                             style="width: 100%; height: auto; border-radius: 10px; display: block;">
                    </div>
                </div>
            @empty
                <p style="text-align: center; color: #666; width: 100%;">Belum ada data perkembangan yang diunggah.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- SECTION TARGET PSS --}}
<section class="section-target-pss">
    <div class="container">
        <h2 class="target-pss-title">
            TARGET BULANAN PEMBINAAN STATISTIK SEKTORAL (PSS)
        </h2>
    </div>
</section>

<section class="section-checklist-pss">
    <div class="container">
        <ul class="checklist-pss">
            @forelse($targets as $target)
                {{-- Hanya tampilkan yang is_active == true (sudah difilter di controller sebenarnya, tapi jaga-jaga) --}}
                @if($target->is_active) 
                    <li>
                        <i class="fas fa-check-circle" style="margin-right: 10px; color: var(--bps-green)"></i>
                        {{ $target->judul_target }}
                    </li>
                @endif
            @empty
                <li>Belum ada target bulanan yang ditetapkan.</li>
            @endforelse
        </ul>
    </div>
</section>

{{-- SECTION KEGIATAN --}}
<section id="fungsi" class="section-blue">
    <div class="container">
        <h2 class="statistik-title">
            <span class="statistik-light">KEGIATAN</span><br>
            PEMBINAAN<br>
            STATISTIK SEKTORAL
        </h2>
        <div class="news-feed-container" id="scrollContainer">
            @forelse($kegiatans as $kegiatan)
            <div class="news-card-trending">
                {{-- Foto kegiatan dari database --}}
                <img src="{{ asset('storage/' . $kegiatan->foto) }}" alt="{{ $kegiatan->judul }}">
                <div class="overlay-trending"></div>
                <div class="content-trending">
                    <small style="color: var(--bps-orange);">{{ $kegiatan->created_at->format('d M Y') }}</small>
                    <h2>{{ $kegiatan->judul }}</h2>
                    <p>{{ Str::limit($kegiatan->deskripsi, 100) }}</p>
                </div>
            </div>
            @empty
            <p style="color: white; text-align: center; width: 100%;">Belum ada dokumentasi kegiatan.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- MODAL KONTAK --}}
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
    // MODAL
    function openModal() { document.getElementById('contactModal').style.display = 'flex'; }
    function closeModal() { document.getElementById('contactModal').style.display = 'none'; }

    // HORIZONTAL SCROLL UNTUK KEGIATAN
    const container = document.getElementById("scrollContainer");
    if(container) {
        container.addEventListener("wheel", (evt) => {
            if (Math.abs(evt.deltaY) > Math.abs(evt.deltaX)) {
                evt.preventDefault();
                container.scrollLeft += evt.deltaY;
            }
        });
    }
</script>
@endsection