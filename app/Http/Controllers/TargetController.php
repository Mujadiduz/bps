<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Illuminate\Http\Request;

class TargetController extends Controller
{
    public function index()
    {
        $targets = Target::latest()->get();
        return view('admin.target', compact('targets'));
    }

    public function store(Request $request)
    {
        $request->validate(['judul_target' => 'required|max:150']);

        Target::create([
            'judul_target' => $request->judul_target,
            'is_active' => false // Default tidak langsung aktif
        ]);

        return back()->with('success', 'Target baru ditambahkan.');
    }

    // LOGIC UTAMA: Tombol Aktifkan
    public function toggleStatus($id)
    {
        $target = Target::findOrFail($id);

        // Simpan status baru (kebalikan dari yang sekarang)
        $newStatus = !$target->is_active;

        $target->update([
            'is_active' => $newStatus
        ]);

        // Tentukan kata-kata berdasarkan status baru
        $pesan = $newStatus ? 'Target berhasil ditampilkan!' : 'Target berhasil disembunyikan!';

        return back()->with('success', $pesan);
    }

    public function destroy($id)
    {
        Target::destroy($id);
        return back()->with('success', 'Target dihapus.');
    }
}
