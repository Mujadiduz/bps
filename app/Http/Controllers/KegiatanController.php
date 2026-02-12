<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    // Tampilkan Halaman & Daftar Tabel
    public function index()
    {
        $kegiatans = Kegiatan::latest()->get();
        return view('admin.kegiatan', compact('kegiatans'));
    }

    // Simpan Data
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:100',
            'deskripsi' => 'required|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload Foto
        $fotoPath = $request->file('foto')->store('kegiatan', 'public');

        Kegiatan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
        ]);

        return back()->with('success', 'Kegiatan berhasil dipublikasikan!');
    }

    // Hapus Data
    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        Storage::disk('public')->delete($kegiatan->foto); // Hapus file fisik
        $kegiatan->delete();

        return back()->with('success', 'Kegiatan berhasil dihapus!');
    }
}