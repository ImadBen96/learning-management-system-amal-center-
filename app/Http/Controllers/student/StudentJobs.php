<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\admin\jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentJobs extends Controller
{
    public function index(){
        $jobs = jobs::where('student_id',Auth::user()->id)->get();

        return view('student.student_jobs',compact('jobs'));
    }
    public function accepte($id){
        $jobs = jobs::find($id);
        $jobs->update([
           'status' => 1,
        ]);
        if ($jobs){
            return redirect()->route('student.jobs')->with(['success' => "Job Is Accepted!!!"]);
        }
    }
    public function refuse($id){
        $jobs = jobs::find($id);
        $jobs->update([
            'status' => 2,
        ]);
        if ($jobs){
            return redirect()->route('student.jobs')->with(['success' => "Job Is Refused!!!"]);
        }
    }
}
