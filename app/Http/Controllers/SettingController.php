<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Diagram; // <--- Pastikan ini merujuk ke App\Models
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key');
        $diagrams = Diagram::all(); // Mengambil data dari App\Models\Diagram
        return view('admin.settings', compact('settings', 'diagrams'));
    }

    public function update(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            if ($request->hasFile($key)) {
                // Hapus file lama jika ada di db
                $old = Setting::where('key', $key)->first();
                if ($old && $old->value) {
                    Storage::disk('public')->delete($old->value);
                }
                // Simpan file baru ke folder settings
                $value = $request->file($key)->store('settings', 'public');
            }

            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return back()->with('success', 'Konten Beranda berhasil diperbarui!');
    }

    public function storeDiagram(Request $request)
    {
        $request->validate(['foto' => 'required|image|mimes:jpeg,png,jpg']);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('diagrams', 'public');
            Diagram::create(['foto' => $path]); // Simpan ke database
        }
        return back()->with('success', 'Diagram berhasil ditambah!');
    }

    public function destroyDiagram($id)
    {
        $diagram = Diagram::findOrFail($id);
        if ($diagram->foto) Storage::disk('public')->delete($diagram->foto);
        $diagram->delete();
        return back()->with('success', 'Diagram berhasil dihapus!');
    }

    public function storeProgram(Request $request) {
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required',
        'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $path = $request->file('foto')->store('programs', 'public');

    \App\Models\Program::create([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'foto' => $path,
    ]);

    return back()->with('success', 'Program berhasil ditambahkan!');
}
}
