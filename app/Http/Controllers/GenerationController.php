<?php

namespace App\Http\Controllers;

use App\Models\Generation;
use Illuminate\Http\Request;


class GenerationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function show()
    {
        $generations = Generation::all(); // Mengambil semua data generasi dari model Generation

        $years = []; // Inisialisasi array untuk menampung tahun-tahun

        foreach ($generations as $generation) {
            $years[] = explode('/', $generation->academic_years); // Memisahkan tahun dari atribut 'year' dan menyimpannya dalam array
        }

        return view('templates.adel.generation', ['years' => $years, 'generations' => $generations]); // Menampilkan view dengan data tahun

    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'academic_years' => 'required',
        //     'semester' => 'required',
        // ], [
        //     'academic_years.required' => 'Tahun Awal harus diisi.',
        //     'semester.required' => 'Semester harus dipilih.',
        // ]);


        $tahun_awal = $request->input('tahun_awal');
        $tahun_akhir = $request->input('tahun_akhir');
        $result = $tahun_awal . '/' . $tahun_akhir;


        // return $request->input('academic_years', $result);

        // return $request->input('academic_years');

        $generation = Generation::create([

            'academic_years' => $result,
            'semester' => $request->input('semester'),
        ]);

        if ($generation) {
            return redirect('generation')->with('success', 'Data Tahun Angkatan berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan data Tahun Angkatan');
        }
    }

    /**
     * Display the specified resource.
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Generation $generation)
    {
        //
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

        return redirect()->back()->with('success', 'Data angkatan berhasil diubah');
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
