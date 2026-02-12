@extends('layouts.admin')

@section('admin_content')
<div style="max-width: 1000px; margin: auto; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    
    <div style="margin-bottom: 25px; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h2 style="color: #1e293b; margin: 0;"><i class="fas fa-bullseye" style="color: var(--bps-orange);"></i> Manajemen Target Utama</h2>
            <p style="color: #64748b; margin-top: 5px;">Kelola target kinerja dan pilih mana saja yang ingin ditampilkan di Landing Page.</p>
        </div>
    </div>

    @if(session('success'))
        <div style="padding: 15px; background: #dcfce7; color: #166534; border-radius: 8px; margin-bottom: 25px; border: 1px solid #bbf7d0; display: flex; align-items: center; gap: 10px;">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div class="card" style="background: white; padding: 25px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); margin-bottom: 30px;">
        <h4 style="margin-top: 0; margin-bottom: 20px; color: #334155;"><i class="fas fa-plus-circle"></i> Tambah Target Baru</h4>
        <form action="{{ route('admin.target.store') }}" method="POST" style="display: flex; gap: 15px; align-items: flex-end;">
            @csrf
            <div style="flex: 1;">
                <label style="display:block; margin-bottom: 8px; font-weight: 600; font-size: 14px; color: #475569;">Judul Target</label>
                <input type="text" name="judul_target" required placeholder="Contoh: Sensus Ekonomi 2026..." 
                    style="width:100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; outline: none; transition: border 0.3s;"
                    onfocus="this.style.borderColor='var(--bps-orange)'" onblur="this.style.borderColor='#cbd5e1'">
            </div>
            <button type="submit" style="padding: 0 25px; background: var(--bps-orange); color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; height: 46px; transition: 0.3s; display: flex; align-items: center; gap: 8px;">
                <i class="fas fa-save"></i> Simpan
            </button>
        </form>
    </div>

    <div class="card" style="background: white; padding: 25px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">
        <h4 style="margin-top: 0; margin-bottom: 20px; color: #334155;">Riwayat & Status Tampilan</h4>
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
                <thead>
                    <tr style="background: #f8fafc; text-align: left; border-bottom: 2px solid #e2e8f0;">
                        <th style="padding: 15px; width: 50px; color: #475569;">No</th>
                        <th style="padding: 15px; color: #475569;">Judul Target</th>
                        <th style="padding: 15px; width: 200px; color: #475569;">Status Tampilan</th>
                        <th style="padding: 15px; width: 120px; text-align: center; color: #475569;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($targets as $index => $t)
                    <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.2s; {{ $t->is_active ? 'background: #fffcf5;' : '' }}" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='{{ $t->is_active ? '#fffcf5' : 'transparent' }}'">
                        <td style="padding: 15px; color: #64748b;">{{ $index + 1 }}</td>
                        <td style="padding: 15px; {{ $t->is_active ? 'font-weight: 600; color: #1e293b;' : 'color: #64748b;' }}">
                            {{ $t->judul_target }}
                        </td>
                        <td style="padding: 15px;">
                            {{-- FORM TOGGLE SAKLAR --}}
                            <form action="{{ route('admin.target.toggle', $t->id) }}" method="POST">
                                @csrf
                                @if($t->is_active)
                                    <button type="submit" title="Klik untuk sembunyikan" style="background: #dcfce7; color: #166534; border: 1px solid #bbf7d0; padding: 6px 14px; border-radius: 20px; font-size: 11px; font-weight: bold; cursor: pointer; display: flex; align-items: center; gap: 6px;">
                                        <i class="fas fa-check-circle"></i> Tampil di Depan
                                    </button>
                                @else
                                    <button type="submit" title="Klik untuk tampilkan" style="background: #f1f5f9; color: #475569; border: 1px solid #cbd5e1; padding: 6px 14px; border-radius: 20px; font-size: 11px; font-weight: bold; cursor: pointer; display: flex; align-items: center; gap: 6px;">
                                        <i class="fas fa-eye-slash"></i> Sembunyi
                                    </button>
                                @endif
                            </form>
                        </td>
                        <td style="padding: 15px; text-align: center;">
                            <div style="display: flex; justify-content: center; gap: 15px;">
                                <button title="Edit" style="border:none; background:none; color: var(--bps-blue); cursor:pointer; font-size: 16px;">
                                    <i class="fas fa-edit"></i>
                                </button>
                                
                                <form action="{{ route('admin.target.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus target ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Hapus" style="border:none; background:none; color: #ef4444; cursor:pointer; font-size: 16px;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 40px; color: #94a3b8;">
                            <i class="fas fa-folder-open" style="font-size: 24px; margin-bottom: 10px; display: block;"></i>
                            Belum ada data target yang dibuat.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

<script>
    // Tunggu halaman selesai dimuat
    document.addEventListener('DOMContentLoaded', function() {
        const alert = document.querySelector('[style*="background: #dcfce7"]');
        if (alert) {
            setTimeout(() => {
                alert.style.transition = "opacity 0.5s ease";
                alert.style.opacity = "0";
                setTimeout(() => alert.remove(), 500);
            }, 3000); // 3000ms = 3 detik
        }
    });
</script>