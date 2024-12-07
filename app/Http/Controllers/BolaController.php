<?php

namespace App\Http\Controllers;

use App\Models\bola;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BolaController extends Controller
{
    // Menampilkan daftar semua film
    public function index()
    {
        $bolas = bola::all();
        return view('bolas.index', compact('bolas'));
    }

    // Menampilkan form tambah film baru
    public function create()
    {
        return view('bolas.create');
    }

    // Menyimpan data film baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'nama_tim' => 'required|string|max:255',
            'tahun' => 'required|string|max:255',
            'pelatih' => 'required|string|max:255',
            'kandang' => 'required|string|max:255',
            'juara' => 'required|string|max:255',
            'sejarah' => 'nullable|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $bola = new bola();
        $bola->nama_tim = $request->nama_tim;
        $bola->tahun = $request->tahun;
        $bola->pelatih = $request->pelatih;
        $bola->kandang = $request->kandang;
        $bola->juara = $request->juara;
        $bola->sejarah = $request->sejarah;

        // Membuat slug yang unik
        $slug = Str::slug($request->nama_tim);
        $count = bola::where('slug', $slug)->count();

        if ($count > 0) {
            $slug .= '-' . ($count + 1); // Menambahkan angka jika slug sudah ada
        }

        $bola->slug = $slug; // Menggunakan slug yang sudah dipastikan unik

        // Upload gambar cover
        if ($request->hasFile('logo')) {
            $coverPath = $request->file('logo')->store('logos', 'public'); // Menyimpan di storage/app/public/covers
            $bola->logo = $coverPath;
        }

        $bola->save();

        return redirect()->route('bolas.index')->with('success', 'Tim Bola Berhasil Ditambahkan');
    }

    // Menampilkan detail film tertentu
    public function show($slug)
    {
        $bola = bola::where('slug', $slug)->firstOrFail(); // Mencari film berdasarkan slug
        return view('bolas.show', compact('bola')); // Mengembalikan view
    }

    // Menampilkan form edit film yang sudah ada
    public function edit($slug)
    {
        $bola = bola::where('slug', $slug)->firstOrFail(); // Mencari film berdasarkan slug
        return view('bolas.edit', compact('bola'));
    }

    // Update data film yang ada
    public function update(Request $request, $slug)
    {
        $request->validate([
            'nama_tim' => 'required|string|max:255',
            'tahun' => 'required|string|max:255',
            'pelatih' => 'required|string|max:255',
            'kandang' => 'required|string|max:255',
            'juara' => 'required|string|max:255',
            'sejarah' => 'nullable|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $bola = bola::where('slug', $slug)->firstOrFail(); // Mencari film berdasarkan slug
        $bola->nama_tim = $request->nama_tim;
        $bola->tahun = $request->tahun;
        $bola->pelatih = $request->pelatih;
        $bola->kandang = $request->kandang;
        $bola->juara = $request->juara;
        $bola->sejarah = $request->sejarah;

        // Upload cover baru jika ada
        if ($request->hasFile('logo')) {
            // Hapus cover lama jika ada
            if ($bola->logo) {
                Storage::disk('public')->delete($bola->logo);
            }
            $coverPath = $request->file('logo')->store('logos', 'public');
            $bola->logo = $coverPath;
        }

        $bola->save();

        return redirect()->route('bolas.index')->with('success', 'Tim Bola Berhasil Diperbarui');
    }

    // Menghapus film
    public function destroy($slug)
    {
        $bola = bola::where('slug', $slug)->firstOrFail(); // Mencari film berdasarkan slug

        // Hapus file cover dari storage jika ada
        if ($bola->logo) {
            Storage::delete($bola->logo);
        }

        $bola->delete();
        return redirect()->route('bolas.index')->with('success', 'Tim Bola Berhasil Dihapus');
    }
}
