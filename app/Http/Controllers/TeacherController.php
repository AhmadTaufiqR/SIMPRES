<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Ramsey\Uuid\Guid\GuidBuilder;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher = Teacher::all();
        // return $teacher;
        return view('templates.Rayhans.Guru', compact('teacher'));
    }

    public function create()
    {
        return view('Teacher.create');
    }

    public function store(Request $request)
    {
        //    return view('pages.aisyah.admin');
        $request->validate([
            'nip' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'phone' => 'required',
        ]);
        $teacher = Teacher::Create([
            'nip' => $request->input('nip'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone'),
        ]);
        if ($teacher) {
            return redirect('/')->with('status', 'guru create');
        } else {
            var_dump('kosong');
        }
    }
    public function update(Request $request, int $id)
    {
        $request->validate([
            'nip' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'phone' => 'required',
        ]);
        Teacher::findOrFail($id)->update([
            'nip' => $request->input('nip'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone'),
        ]);
        return redirect()->back()->with('status', 'Guru update');


        
        // if($admin){
        //     return redirect('admin')->with('status', 'adminupdate');
        // } else {
        //     var_dump('kososng');
        // }
    }


    

    public function hapus(int $id)
    {
        $teacher = Teacher::find($id);
        if (!$teacher) {
            dd('Record not found');
        }
        $teacher->delete();
        return redirect()->back()->with('status', 'Guru berhasil dihapus');
    }
}



  