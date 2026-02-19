@extends('layouts.admin')

@section('admin_content')
<div class="card">
    <h3 style="margin-bottom: 20px; color: var(--bps-blue);">
        <i class="fas fa-cog"></i> Pengaturan Konten Beranda
    </h3>

    {{-- Menu Tab --}}
    <div style="display: flex; gap: 10px; border-bottom: 2px solid #e2e8f0; margin-bottom: 25px;">
        <button onclick="openTab('hero')" class="tab-btn active-tab" id="btn-hero">Beranda (Hero)</button>
        <button onclick="openTab('diagram')" class="tab-btn" id="btn-diagram">Beranda (Diagram)</button>
        {{-- TOMBOL BARU --}}
        <button onclick="openTab('profile')" class="tab-btn" id="btn-profile">Halaman Profile</button>
    </div>

    {{-- TAB 1: HERO SECTION --}}
<div id="hero" class="tab-content">
    {{-- Update form agar support upload file --}}
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom: 8px; font-weight: 600;">Judul Hero (Besar)</label>
            <textarea name="hero_title" rows="3" 
                style="width:100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px;">{{ $settings['hero_title'] ?? ''}}</textarea>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; margin-bottom: 8px; font-weight: 600;">Sub-Judul (Kecil)</label>
            <textarea name="hero_subtitle" rows="2" 
                style="width:100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px;">{{ $settings['hero_subtitle'] ?? '' }}</textarea>
        </div>

        {{-- INPUT FOTO HERO BARU --}}
        <div style="margin-bottom: 20px; padding: 15px; background: #f8fafc; border-radius: 8px; border: 1px solid #e2e8f0;">
            <label style="display:block; margin-bottom: 8px; font-weight: 600;">Foto Hero (Samping Teks)</label>
            
            @if(isset($settings['hero_image']))
                <div style="margin-bottom: 10px;">
                    <img src="{{ asset('storage/' . $settings['hero_image']) }}" alt="Preview" style="height: 100px; border-radius: 5px; border: 1px solid #ddd;">
                </div>
            @endif
            
            <input type="file" name="hero_image" style="font-size: 13px;">
            <small style="display:block; color: #64748b; mt-1">* Format: JPG/PNG, Max: 2MB. Mengganti foto lama jika diupload.</small>
        </div>
        
        <button type="submit" style="background: var(--bps-green); color: white; border: none; padding: 12px 30px; border-radius: 8px; font-weight: bold; cursor: pointer;">
            <i class="fas fa-save"></i> Simpan Teks & Foto Hero
        </button>
    </form>
</div>

    {{-- TAB 2: DIAGRAM SECTION --}}
    <div id="diagram" class="tab-content" style="display:none;">
        <form action="{{ route('admin.diagram.store') }}" method="POST" enctype="multipart/form-data" style="margin-bottom: 30px; padding: 20px; background: #f8fafc; border-radius: 10px; border: 1px dashed #cbd5e1;">
            @csrf
            <label style="display:block; margin-bottom: 8px; font-weight: 600;">Tambah Diagram Baru</label>
            <div style="display: flex; gap: 10px;">
                <input type="file" name="foto" required style="padding: 8px; border: 1px solid #cbd5e1; border-radius: 8px; background: white;">
                <button type="submit" style="background: var(--bps-blue); color: white; border: none; padding: 0 20px; border-radius: 8px; cursor: pointer;">
                    <i class="fas fa-upload"></i> Upload Diagram
                </button>
            </div>
        </form>

        <label style="display:block; margin-bottom: 15px; font-weight: 600;">Daftar Diagram Saat Ini:</label>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 15px;">
            @foreach($diagrams as $d)
            <div style="border: 1px solid #e2e8f0; padding: 10px; border-radius: 10px; text-align: center; background: white;">
                <img src="{{ asset('storage/' . $d->foto) }}" style="width: 100%; height: 120px; object-fit: contain; margin-bottom: 10px;">
                <form action="{{ route('admin.diagram.destroy', $d->id) }}" method="POST" onsubmit="return confirm('Hapus diagram ini?')">
                    @csrf @method('DELETE')
                    <button type="submit" style="background: #ef4444; color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer; font-size: 12px; width: 100%;">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </form>
            </div>
            @endforeach
        </div>
    </div>

    {{-- TAB 3: PROFILE SECTION --}}
<div id="profile" class="tab-content" style="display:none;">
    
    {{-- FORM UTAMA UNTUK TEKS & FOTO (Tabel Settings) --}}
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" style="margin-bottom: 30px; padding: 25px; border: 1px solid #e2e8f0; border-radius: 12px; background: white; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
        @csrf
        <h4 style="margin-top:0; color: var(--bps-blue); border-bottom: 2px solid #f1f5f9; padding-bottom: 10px; margin-bottom: 20px;">
            <i class="fas fa-id-card"></i> Pengaturan Konten Halaman Profile
        </h4>
        
        {{-- SECTION HERO (ATAS) --}}
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
            <div>
                <label style="display:block; font-weight:600; margin-bottom:8px;">Judul Hero Profile (Besar)</label>
                <textarea name="profile_hero_title" rows="3" style="width:100%; padding: 12px; border-radius: 8px; border: 1px solid #cbd5e1;" placeholder="Contoh: SATU DATA, BANYAK MAKNA...">{{ $settings['profile_hero_title'] ?? '' }}</textarea>
            </div>
            <div>
                <label style="display:block; font-weight:600; margin-bottom:8px;">Sub-judul Hero Profile (Kecil)</label>
                <textarea name="profile_hero_subtitle" rows="3" style="width:100%; padding: 12px; border-radius: 8px; border: 1px solid #cbd5e1;" placeholder="Contoh: untuk mendukung pembangunan kabupaten pasuruan">{{ $settings['profile_hero_subtitle'] ?? '' }}</textarea>
            </div>
        </div>

        <div style="margin-bottom: 15px;">
    <label style="display:block; font-weight:600; margin-bottom:5px;">Judul Footer Profile</label>
    <input type="text" name="profile_footer_title" 
           value="{{ $settings['profile_footer_title'] ?? 'SATU DATA UNTUK NEGERI' }}" 
           style="width:100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd;">
    <small>* Contoh: SATU DATA UNTUK NEGERI</small>
</div>

        {{-- SECTION FOOTER (SATU DATA UNTUK NEGERI) --}}
        <div style="margin-bottom: 25px; padding: 15px; background: #f8fafc; border-radius: 10px; border: 1px solid #e2e8f0;">
            <label style="display:block; font-weight:600; margin-bottom:8px;">Deskripsi "Satu Data Untuk Negeri" (Bawah)</label>
            <textarea name="profile_footer_text" rows="3" style="width:100%; padding: 12px; border-radius: 8px; border: 1px solid #cbd5e1;" placeholder="Jelaskan komitmen BPS di sini...">{{ $settings['profile_footer_text'] ?? '' }}</textarea>
        </div>

        {{-- UPLOAD FOTO SECTION --}}
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            {{-- Foto Hero Kiri --}}
            <div style="padding:15px; border: 1px solid #e2e8f0; border-radius:8px;">
                <label style="display:block; font-weight:600; margin-bottom:10px;">Foto Hero (Samping Teks Atas)</label>
                <div style="display: flex; gap: 10px; align-items: center;">
                    <input type="file" name="profile_hero_image" style="font-size: 12px; flex: 1;">
                    @if(isset($settings['profile_hero_image']))
                        <img src="{{ asset('storage/'.$settings['profile_hero_image']) }}" style="height:40px; border-radius:4px; border: 1px solid #ddd;">
                    @endif
                </div>
            </div>

            {{-- Foto Footer Kanan --}}
            <div style="padding:15px; border: 1px solid #e2e8f0; border-radius:8px;">
                <label style="display:block; font-weight:600; margin-bottom:10px;">Foto Samping "Satu Data Untuk Negeri"</label>
                <div style="display: flex; gap: 10px; align-items: center;">
                    <input type="file" name="profile_footer_image" style="font-size: 12px; flex: 1;">
                    @if(isset($settings['profile_footer_image']))
                        <img src="{{ asset('storage/'.$settings['profile_footer_image']) }}" style="height:40px; border-radius:4px; border: 1px solid #ddd;">
                    @endif
                </div>
            </div>
        </div>
        
        <div style="margin-top:25px; text-align:right;">
             <button type="submit" style="background: var(--bps-green); color: white; border: none; padding: 12px 35px; border-radius: 8px; font-weight:bold; cursor: pointer; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <i class="fas fa-save"></i> Simpan Semua Perubahan Profile
            </button>
        </div>
    </form>

    <hr style="margin: 40px 0; border: 0; border-top: 2px dashed #e2e8f0;">

    {{-- BAGIAN 2: DAFTAR KARTU PROGRAM (Tabel Programs) --}}
    <div style="background: #ffffff; padding: 25px; border-radius: 12px; border: 1px solid #e2e8f0;">
        <h4 style="margin-top:0; color: var(--bps-blue);"><i class="fas fa-th-large"></i> Manajemen Kartu Program</h4>
        
        <form action="{{ route('admin.program.store') }}" method="POST" enctype="multipart/form-data" style="background: #f8fafc; padding: 20px; border-radius: 10px; border: 1px solid #cbd5e1; margin-bottom: 20px;">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                <div>
                    <label style="display:block; font-weight:600; margin-bottom:5px;">Judul Program</label>
                    <input type="text" name="judul" class="form-control" style="width:100%; padding: 10px; border-radius: 6px; border: 1px solid #ddd;" required placeholder="Contoh: Internalisasi">
                </div>
                <div>
                    <label style="display:block; font-weight:600; margin-bottom:5px;">Upload Icon/Foto</label>
                    <input type="file" name="foto" required style="width:100%;">
                </div>
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display:block; font-weight:600; margin-bottom:5px;">Deskripsi Singkat</label>
                <textarea name="deskripsi" rows="2" style="width:100%; padding: 10px; border-radius: 6px; border: 1px solid #ddd;" required placeholder="Penjelasan mengenai program..."></textarea>
            </div>
            <button type="submit" style="background: var(--bps-blue); color: white; border: none; padding: 10px 20px; border-radius: 8px; cursor: pointer; font-weight:600;">
                <i class="fas fa-plus"></i> Tambah Kartu Program
            </button>
        </form>

        {{-- LIST PROGRAM YANG SUDAH ADA --}}
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 15px;">
            @foreach(\App\Models\Program::all() as $prog)
            <div style="border: 1px solid #e2e8f0; padding: 12px; border-radius: 10px; display: flex; align-items: center; gap: 10px; background: #fff;">
                <img src="{{ asset('storage/' . $prog->foto) }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                <div style="flex: 1;">
                    <strong style="display: block; font-size: 14px;">{{ $prog->judul }}</strong>
                    <form action="{{ route('admin.program.destroy', $prog->id) }}" method="POST" onsubmit="return confirm('Hapus program ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" style="color: #ef4444; border: none; background: none; padding: 0; font-size: 12px; cursor: pointer;">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    function openTab(tabName) {
        document.querySelectorAll('.tab-content').forEach(tab => tab.style.display = 'none');
        document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active-tab'));
        
        document.getElementById(tabName).style.display = 'block';
        if(tabName === 'hero') document.getElementById('btn-hero').classList.add('active-tab');
        if(tabName === 'diagram') document.getElementById('btn-diagram').classList.add('active-tab');
    }
</script>
@endsection