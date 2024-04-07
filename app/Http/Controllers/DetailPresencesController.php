<?php

namespace App\Http\Controllers;

use App\Models\DetailPresences;
use App\Models\Presence;
use App\Models\Teacher;
use Illuminate\Http\Request;


class DetailPresencesController extends Controller
{
    /**
    * Menampilkan daftar data presensi.
    */
    public function show()
    {
        $detailPresences = DetailPresences::with('teacher', 'course')->get(); // Ambil data detail presensi beserta relasi teacher dan course
        return view('pages.aisyah.detail_presences', compact('detailPresences'));
    }
    /**
    * Menyimpan data presensi baru.
    */
    public function store(Request $request)
    {
        // Tambahkan logika untuk menyimpan data presensi baru
    }
    
    /**
    * Menampilkan data presensi spesifik.
    */
    public function showDetail(DetailPresences $detail_presences)
    {
        // Tambahkan logika untuk menampilkan detail data presensi
    }
    
    /**
    * Memperbarui data presensi yang sudah ada.
    */
    public function update(Request $request, DetailPresences $detail_presences)
    {
        // Tambahkan logika untuk memperbarui data presensi
    }
    
    /**
    * Menghapus data presensi.
    */
    public function destroy(DetailPresences $detail_presences)
    {
        // Tambahkan logika untuk menghapus data presensi
    }
}
