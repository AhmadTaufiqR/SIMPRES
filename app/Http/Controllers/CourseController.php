<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index_course()
    {
        $course = Course::all();
        return view('templates.amel.courses', ['courses' => $course]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $course = Course::create([
            'name' => $request->input('name'),
        ]);
        if ($course) {
            return redirect('courses')->with('Success', 'Data pelajaran berhasil ditambahkan');
        } else {
            var_dump('kosong');
        }
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $course = Course::findOrFail($id);
        $course -> update([
            'name' => $request->input('name'),
        ]);
        return redirect('/courses')->with('Success', 'Data Palajaran berhasil diubah' );
    }


    public function delete(int $id)
    {
        $course = Course::find($id);
        if (!$course) {
            return redirect('/courses')->withErrors('Record not found');
        }
        $course->delete();
        return redirect('/courses')->with('Success', 'Data pelajaran berhasil dihapus');
    }
}

