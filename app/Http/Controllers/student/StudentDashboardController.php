<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\admin\Interships;
use App\Models\admin\jobs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class StudentDashboardController extends Controller
{

    public function index(){
        $interships = Interships::where('student_id',Auth::user()->id)->count();
        $jobs = jobs::where('student_id',Auth::user()->id)->count();

        return view('student.index',compact(['interships','jobs']));
    }
    public function logout_student(Request $request){
        Log::info('logout');
        User::where('id' , Auth::user()->id)->update(['is_online' => false]);
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return  redirect()->route('student.login');
    }

}
