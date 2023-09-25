<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\admin\monitoring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentMonitorings extends Controller
{
    public function index(){
        $monitorings = monitoring::where('student_id',Auth::user()->id)->get();

        return view('student.student_monitorings',compact('monitorings'));
    }
}
