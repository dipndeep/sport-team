<?php

namespace App\Http\Controllers;

use App\Models\basket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BasketController extends Controller
{
    // Menampilkan daftar semua film
    public function index()
    {
        $baskets = basket::all();
        return view('baskets.index', compact('baskets'));
    }

    // Menampilkan form tambah film baru
    public function create()
    {
        return view('baskets.create');
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

        $basket = new basket();
        $basket->nama_tim = $request->nama_tim;
        $basket->tahun = $request->tahun;
        $basket->pelatih = $request->pelatih;
        $basket->kandang = $request->kandang;
        $basket->juara = $request->juara;
        $basket->sejarah = $request->sejarah;

        // Membuat slug yang unik
        $slug = Str::slug($request->nama_tim);
        $count = basket::where('slug', $slug)->count();

        if ($count > 0) {
            $slug .= '-' . ($count + 1); // Menambahkan angka jika slug sudah ada
        }

        $basket->slug = $slug; // Menggunakan slug yang sudah dipastikan unik

        // Upload gambar cover
        if ($request->hasFile('logo')) {
            $coverPath = $request->file('logo')->store('logos', 'public'); // Menyimpan di storage/app/public/covers
            $basket->logo = $coverPath;
        }

        $basket->save();

        return redirect()->route('baskets.index')->with('success', 'Tim Basket Berhasil Ditambahkan');
    }

    // Menampilkan detail film tertentu
    public function show($slug)
    {
        $basket = basket::where('slug', $slug)->firstOrFail(); // Mencari film berdasarkan slug
        return view('baskets.show', compact('basket')); // Mengembalikan view
    }

    // Menampilkan form edit film yang sudah ada
    public function edit($slug)
    {
        $basket = basket::where('slug', $slug)->firstOrFail(); // Mencari film berdasarkan slug
        return view('baskets.edit', compact('basket'));
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

        $basket = basket::where('slug', $slug)->firstOrFail(); // Mencari film berdasarkan slug
        $basket->nama_tim = $request->nama_tim;
        $basket->tahun = $request->tahun;
        $basket->pelatih = $request->pelatih;
        $basket->kandang = $request->kandang;
        $basket->juara = $request->juara;
        $basket->sejarah = $request->sejarah;

        // Upload cover baru jika ada
        if ($request->hasFile('logo')) {
            // Hapus cover lama jika ada
            if ($basket->logo) {
                Storage::disk('public')->delete($basket->logo);
            }
            $coverPath = $request->file('logo')->store('logos', 'public');
            $basket->logo = $coverPath;
        }

        $basket->save();

        return redirect()->route('baskets.index')->with('success', 'Tim Basket Berhasil Diperbarui');
    }

    // Menghapus film
    public function destroy($slug)
    {
        $basket = basket::where('slug', $slug)->firstOrFail(); // Mencari film berdasarkan slug

        // Hapus file cover dari storage jika ada
        if ($basket->logo) {
            Storage::delete($basket->logo);
        }

        $basket->delete();
        return redirect()->route('baskets.index')->with('success', 'Tim Basket Berhasil Dihapus');
    }
}
