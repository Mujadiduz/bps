@extends('layouts.admin')

@section('admin_content')
<div style="max-width: 1100px; margin: auto;">
    
    <div style="margin-bottom: 25px;">
        <h2 style="color: #1e293b;">Manajemen Konten BPS</h2>
        <p style="color: var(--text-muted);">Gunakan form ini untuk memperbarui foto kegiatan dan target utama.</p>
    </div>

    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 25px; margin-bottom: 40px;">
            
            <div class="card" style="background: white; padding: 25px; border-radius: 12px; border: 1px solid #e2e8f0; border-top: 5px solid var(--bps-blue);">
                <h4 style="margin-bottom: 20px;"><i class="fas fa-camera"></i> Tambah Kegiatan Baru</h4>
                <div style="margin-bottom: 15px;">
                    <label style="display:block; margin-bottom: 5px; font-weight: 600;">Judul Kegiatan</label>
                    <input type="text" name="judul" class="form-control" style="width:100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 8px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display:block; margin-bottom: 5px; font-weight: 600;">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" style="width:100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 8px; resize:none;"></textarea>
                </div>
                <div>
                    <label style="display:block; margin-bottom: 5px; font-weight: 600;">Foto Kegiatan</label>
                    <input type="file" name="foto" style="width:100%; padding: 8px; border: 1px solid #cbd5e1; border-radius: 8px; background: #f8fafc;">
                </div>
            </div>

            <div class="card" style="background: white; padding: 25px; border-radius: 12px; border: 1px solid #e2e8f0; border-top: 5px solid var(--bps-orange); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <h4 style="margin-bottom: 20px;"><i class="fas fa-bullseye"></i> Set Target Utama</h4>
                    <label style="display:block; margin-bottom: 5px; font-weight: 600;">Judul Target Saat Ini</label>
                    <input type="text" name="judul_target" placeholder="Contoh: Sensus Ekonomi 2026" 
                        style="width:100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 8px;">
                    <p style="font-size: 12px; color: #64748b; margin-top: 10px;">* Judul ini akan langsung menggantikan target lama di halaman depan.</p>
                </div>
                
                <button type="submit" style="width: 100%; padding: 15px; background: var(--bps-blue); color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; margin-top: 20px;">
                    <i class="fas fa-save"></i> SIMPAN PERUBAHAN
                </button>
            </div>
        </div>
    </form>

    <div class="card" style="background: white; padding: 25px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
        <h4 style="margin-bottom: 20px;">Daftar Kegiatan & Konten Terpublish</h4>
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #f8fafc; text-align: left; border-bottom: 2px solid #e2e8f0;">
                        <th style="padding: 12px;">Foto</th>
                        <th style="padding: 12px;">Judul Kegiatan</th>
                        <th style="padding: 12px;">Deskripsi</th>
                        <th style="padding: 12px; width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 12px;">
                            <img src="https://via.placeholder.com/80x50" style="border-radius: 4px; object-fit: cover;">
                        </td>
                        <td style="padding: 12px; font-weight: 600;">Rapat Koordinasi Sensus</td>
                        <td style="padding: 12px; color: #64748b; font-size: 13px;">Pembahasan mengenai teknis lapangan...</td>
                        <td style="padding: 12px;">
                            <div style="display: flex; gap: 8px;">
                                <button title="Edit" style="padding: 6px 10px; background: #e0f2fe; color: #0369a1; border: none; border-radius: 4px; cursor: pointer;"><i class="fas fa-edit"></i></button>
                                <button title="Hapus" style="padding: 6px 10px; background: #fee2e2; color: #b91c1c; border: none; border-radius: 4px; cursor: pointer;"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection