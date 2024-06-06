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
            ->orderBy('id', 'desc')
            ->paginate(5);

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
                'start-time' => 'required',
                'end-time' => 'required',
            ], [
                'teacher.required' => 'Guru harus diisi',
                'course.required' => 'Mata pelajaran harus diisi',
                'room.required' => 'Ruangan harus diisi',
                'generation.required' => 'Angkatan harus diisi',
                'day.required' => 'Hari harus diisi',
                'start-time.required' => 'Jam mulai harus diisi',
                'end-time.required' => 'Jam selesai harus diisi',
            ]);

            // Simpan data
           $schedule = Schedule::create([
                "teachers_id" => $validatedData["teacher"],
                "courses_id" => $validatedData["course"],
                "rooms_id" => $validatedData["room"],
                "generations_id" => $validatedData["generation"],
                "day" => $validatedData["day"],
                "start_attendance" => $validatedData["start-time"],
                "end_attendance" => $validatedData["end-time"],
            ]);

            if ($schedule) {
                return redirect("schedules")->with('Success', 'Jadwal berhasil disimpan.');
            } else {
                return redirect("schedules-create-data")->withErrors('Jadwal berhasil disimpan.');
            }
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
            'start-time' => 'required',
            'end-time' => 'required',
        ], [
            'teacher.required' => 'Guru harus diisi',
            'course.required' => 'Mata pelajaran harus diisi',
            'room.required' => 'Ruangan harus diisi',
            'generation.required' => 'Angkatan harus diisi',
            'day.required' => 'Hari harus diisi',
            'start-time.required' => 'Jam mulai harus diisi',
            'end-time.required' => 'Jam selesai harus diisi',
        ]);

        $schedule->update([
            "teachers_id" => $validatedData["teacher"],
            "courses_id" => $validatedData["course"],
            "rooms_id" => $validatedData["room"],
            "generations_id" => $validatedData["generation"],
            "day" => $validatedData["day"],

            "start_attendance" => $validatedData["start-time"],
            "end_attendance" => $validatedData["end-time"],
        ]);

        if ($schedule) {
            return redirect("schedules")->with('Success', 'Jadwal berhasil disimpan.');
        } else {
            return redirect()->back()->withErrors('Jadwal berhasil disimpan.');
        }
    }

    public function destroy(int $id)
    {
        $schedule = Schedule::find($id);
        if (!$schedule) {
            dd('Record not found');
        }
        $schedule->delete();

        return redirect()->back()->with('Success', 'Data jadwal berhasil dihapus');
    }

    public function search(Request $request)
    {
        // $generations = Generation::with('teacher', 'course', 'room', 'generation')->where('name', 'like', "%" . $years . "%")->paginate(5);
        $search = $request->search;

        $Schedules = Schedule::where(function ($query) use ($search) {
            $query->whereHas('teacher', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('course', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        })
        ->with(['teacher', 'course', 'room', 'generation'])
        ->paginate(5);

        if ($Schedules) {
            return view('pagination.pagination_schedule', compact('Schedules'))->render();
        } else {
            return redirect()->json(['status' => 'not_found']);
        }
    }
}
