<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('templates.Rayhans.Room', compact('rooms'));
    }
    public function store(Request $request)
    {
        $room = Room::Create([
            'name_class' => $request->name_class,

        ]);
        if ($room) {
            return redirect('/room')->with('Success', 'Yeeayy!! Data kelas berhasil ditambahkan');
        } else {
            return redirect('/room')->withErrors('Data kelas gagal ditambahkan');
        }
    }
    public function update(Request $request, $id)
    {
        ($request->name_class);
        $room = Room::findOrFail($id)->update([
            'name_class' => $request->name_class,

        ]);    
        if ($room) {
            return redirect()->back()->with('Success', 'Yeeayy!! Data kelas berhasil diubah');
        } else {
            return redirect('/room')->withErrors('Data kelas gagal diubah');
        }
    }




    public function hapus(int $id)
    {
        $room = Room::find($id);
        if (!$room) {
            dd('Record not found');
        }
        $room->delete();
        return redirect()->back()->with('Success', 'Yeeayy!! Data kelas berhasil dihapus');
    }
}
