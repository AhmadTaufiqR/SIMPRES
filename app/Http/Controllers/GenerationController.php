<?php

namespace App\Http\Controllers;

use App\Models\Generation;
use Illuminate\Http\Request;


class GenerationController extends Controller
{

    public function show()
    {
        // Mengambil semua data generasi dari model Generation
        $generations = Generation::get();
        return view('templates.adel.generation', ['generations' => $generations]); // Menampilkan view dengan data tahun
    }

    public function store(Request $request)
    {
        $tahun_awal = $request->input('tahun_awal');
        $tahun_akhir = $request->input('tahun_akhir');
        $result = $tahun_awal . '/' . $tahun_akhir;
        $generation = Generation::create([
            'academic_years' => $result,
            'semester' => $request->input('semester'),
        ]);
        if ($generation) {
            return redirect('generation')->with('Success', 'Data Tahun Angkatan berhasil ditambahkan');
        } else {
            return redirect()->back()->withErrors('Gagal menambahkan data Tahun Angkatan');
        }
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun_awal' => 'required|numeric',
            'tahun_akhir' => 'required|numeric',
            'semester' => 'required',
        ]);

        $tahun_awal = $request->input('tahun_awal');
        $tahun_akhir = $request->input('tahun_akhir');
        $academic_years = $tahun_awal . '/' . $tahun_akhir;

        $generation = Generation::findOrFail($id);
        $generation->update([
            'academic_years' => $academic_years,
            'semester' => $request->input('semester'),
        ]);

        return redirect()->back()->with('Success', 'Data angkatan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus($id)
    {
        $generation = Generation::find($id);
        if (!$generation) {
            dd('Record not found');
        }
        $generation->delete();
        return redirect()->back()->with('Success', 'Data angkatan berhasil dihapus');
    }

}
