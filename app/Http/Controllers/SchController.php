<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use Carbon\Carbon;

class SchController extends Controller
{
    public function create(Request $request)
    {
        $schedule = new Schedule;
            $schedule->participant = $request->participant;
            $schedule->activity = $request->activity;
            $schedule->place = $request->place;
            $schedule->time = $request->time;
            $schedule->detail = $request->detail;

        $schedule->save();

        return view('supDashboard');
    }
}
