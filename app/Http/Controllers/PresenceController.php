<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use App\Models\Schedule;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    public function index()
    {
        $presences = Presence::with('schedule')->get();
        return view('templates.amel.presences', compact('presences'));
    }


    public function getSchedule()
    {
        $presenceSchedulesIds = Presence::pluck('id')->all();
        
        $schedules = Schedule::whereNotIn('id', $presenceSchedulesIds)->get();
        return view('templates.amel.form-presence', compact('schedules'));
    }
       

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'start_attendance' => 'required',
            'end_attendance' => 'required',
        ]);
        $presence =Presence::create([
            $schedule = Schedule::find($id),
            'schedules_id' => $schedule->id,
            'start_attendance' => $request->input('start_attendance'),
            'end_attendance' => $request->input('end_attendance'),
        ]);
        if ($presence)
        {
            return redirect('/presences')->with('success', 'Data kehadiran berhasil ditambahkan');
        } else {
            return redirect('/presences')->with('error', 'Gagal menambahkan data kehadiran');
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(presence $presence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, presence $presence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(presence $presence)
    {
        //
    }
}
