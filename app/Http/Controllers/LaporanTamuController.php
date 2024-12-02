<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LaporanJalan;

class LaporanTamuController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'kelurahan' => 'required|string|max:255',
            'lingkungan' => 'required|string|max:255',
            'rt' => 'required|string|max:10',
            'rw' => 'required|string|max:10',
            'nama_jalan' => 'required|string|max:255',
            'lebar_jalan' => 'required|string|max:50',
            'panjang_jalan' => 'required|string|max:50',
            'kondisi' => 'required|string|max:50',
            'image' => 'nullable|image|max:2048',
        ]);

        // Simpan gambar jika ada
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('uploads/images', 'public');
        }

        // Simpan data ke database
        LaporanJalan::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('laporan.tamu')->with('success', 'Laporan berhasil dikirim!');
    }
}