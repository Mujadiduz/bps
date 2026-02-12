@extends('layouts.admin')

@section('admin_content')
<div class="card">
    <h4 style="margin-bottom: 20px; color: var(--bps-blue);"><i class="fas fa-plus-circle"></i> Tambah Kegiatan Baru</h4>
    
    <form action="{{ route('admin.kegiatan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div>
                <label style="display:block; margin-bottom: 8px; font-weight: 600;">Judul Kegiatan</label>
                <input type="text" name="judul" required placeholder="Masukkan judul..." 
                    style="width:100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 8px;">
            </div>
            <div>
                <label style="display:block; margin-bottom: 8px; font-weight: 600;">Foto Kegiatan</label>
                <input type="file" name="foto" required style="width:100%; padding: 8px; border: 1px solid #cbd5e1; border-radius: 8px; background: #f8fafc;">
            </div>
        </div>
        
        <div style="margin-top: 15px;">
            <label style="display:block; margin-bottom: 8px; font-weight: 600;">Deskripsi Singkat</label>
            <textarea name="deskripsi" rows="3" required maxlength="255"
                placeholder="Tulis deskripsi singkat (Maksimal 1 paragraf / 255 karakter)..." 
                style="width:100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 8px; resize: none;"></textarea>
            <small style="color: #64748b;">* Maksimal 1 paragraf singkat agar tampilan landing page tetap rapi.</small>
        </div>

        <button type="submit" style="margin-top: 20px; padding: 12px 25px; background: var(--bps-blue); color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer;">
            <i class="fas fa-upload"></i> Publish Kegiatan
        </button>
    </form>
</div>

<div class="card" style="margin-top: 30px;">
    <h4 style="margin-bottom: 20px;">Daftar Kegiatan Terpublikasi</h4>
    <div style="overflow-x: auto;">
        <table style="width:100%; border-collapse: collapse; font-size: 14px;">
            <thead>
                <tr style="text-align: left; background: #f8fafc; border-bottom: 2px solid #f1f5f9;">
                    <th style="padding: 12px; width: 80px;">Foto</th>
                    <th style="padding: 12px; width: 200px;">Judul</th>
                    <th style="padding: 12px;">Deskripsi</th> 
                    <th style="padding: 12px; width: 100px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kegiatans as $k)
                <tr style="border-bottom: 1px solid #f1f5f9;">
                    <td style="padding: 12px;">
                        <img src="{{ asset('storage/' . $k->foto) }}" style="width: 60px; height: 40px; border-radius: 4px; object-fit: cover;">
                    </td>
                    <td style="padding: 12px; font-weight: 600;">{{ $k->judul }}</td>
                    <td style="padding: 12px; color: #64748b; line-height: 1.4;">
                        {{ $k->deskripsi }}
                    </td>
                    <td style="padding: 12px; text-align: center;">
                        <div style="display: flex; justify-content: center; gap: 10px;">
                            <button title="Edit" style="color: var(--bps-blue); border: none; background: none; cursor: pointer;"><i class="fas fa-edit"></i></button>
                            
                            <form action="{{ route('admin.kegiatan.destroy', $k->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Hapus" style="color: #ef4444; border: none; background: none; cursor: pointer;">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align: center; padding: 20px; color: #94a3b8;">Belum ada data kegiatan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection