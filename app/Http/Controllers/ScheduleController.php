<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Generation;
use App\Models\Room;
use App\Models\Schedule;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ScheduleController extends Controller
{

    public function index()
    {
        $schedule = Schedule::withTrashed()
        ->whereHas('room')
        ->whereHas('course')
        ->whereHas('generation')
        ->whereHas('teacher')
        ->get();

        return view('templates.Rayhans.Schedules', ['Schedules' => $schedule]);
    }

    public function add()
    {
        $teachers = Teacher::get();
        $courses = Course::get();
        $rooms = Room::get();
        $generations = Generation::get();


        return view('templates.Rayhans.form-schedule', compact("teachers", "courses", "rooms", "generations"));
    }

    public function edit(Schedule $schedule)
    {
        $currentData = $schedule;
        $teachers = Teacher::get();
        $courses = Course::get();
        $rooms = Room::get();
        $generations = Generation::get();


        return view('templates.Rayhans.form-schedule', compact("teachers", "courses", "rooms", "generations", "currentData"));
    }


    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'teacher' => 'required',
            'course' => 'required',
            'room' => 'required',
            'generation' => 'required',
            'day' => 'required',
        ]);

        // Cek keunikan data
        $isUnique = Schedule::where('teachers_id', $validatedData['teacher'])
            ->where('courses_id', $validatedData['course'])
            ->where('rooms_id', $validatedData['room'])
            ->where('generations_id', $validatedData['generation'])
            ->where('day', $validatedData['day'])
            ->doesntExist();

        if (!$isUnique) {
            return redirect()->back()->with('error', 'Jadwal sudah ada.');
        }

        // Simpan data
        Schedule::create([
            "teachers_id" => $validatedData["teacher"],
            "courses_id" => $validatedData["course"],
            "rooms_id" => $validatedData["room"],
            "generations_id" => $validatedData["generation"],
            "day" => $validatedData["day"],
        ]);

        return redirect("schedules")->with('success', 'Jadwal berhasil disimpan.');
    }

    public function update(Request $request, Schedule $schedule)
    {
        // Validasi input
        $validatedData = $request->validate([
            'teacher' => 'required',
            'course' => 'required',
            'room' => 'required',
            'generation' => 'required',
            'day' => 'required',
        ]);

        $schedule->update([
            "teachers_id" => $validatedData["teacher"],
            "courses_id" => $validatedData["course"],
            "rooms_id" => $validatedData["room"],
            "generations_id" => $validatedData["generation"],
            "day" => $validatedData["day"],
        ]);

        if ($schedule) {
            return redirect()->back()->with('Success', 'Yeeayy!! Data Jadwal berhasil diubah');
        } else {
            return redirect('/schedules')->withErrors('Data Jadwal gagal diubah');
        }
    }

    public function destroy(int $id)
    {
        $schedule = Schedule::find($id);
        if (!$schedule) {
            dd('Record not found');
        }
        $schedule->delete();
        return redirect()->back()->with('Success', 'Yeeayy!! Data jadwal berhasil dihapus');
    }
}
