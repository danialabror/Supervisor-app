<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;
use App\User;
use App\Schedule;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $materials = Material::where('status', 'NOTAPPROVE')->get();
        $materials->load('user');

        // TEACHER
        $schedules = Schedule::where('participant', Auth::user()->id)->get();
        $countRPP = Material::where('id_teacher', Auth::user()->id)->get();
        // dd($countRPP->toArray());

        //CURRICULUM
        $schedulesForCurriculum = Schedule::get();
        $teachers = User::where('role', 'TEACHER')->get();

        // dd($schedulesForCurriculum->toArray());

        return view('supDashboard', compact('materials', 'schedules', 'countRPP','schedulesForCurriculum' ,'teachers'));
    }

}
