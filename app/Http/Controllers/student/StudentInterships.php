<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\admin\Interships;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentInterships extends Controller
{
    public function index(){
        $inerships = Interships::where('student_id', Auth::user()->id )->get();

        return view('student.student_interships',compact('inerships'));
    }
    public function more_details($id){
//        $interships = Interships::find($id);
        return view('student.interships_details');
    }
    public function accepte($id){
        $interships = Interships::find($id);

        $interships->update([
            'status' => 1,
        ]);

            if ($interships){
                return redirect()->route('student.interships')->with(['success' => "Interships Is Accepted!!!"]);
            }
    }
    public function refuser($id){
        $interships = Interships::find($id);

        $interships->update([
            'status' => 2,
        ]);
        if ($interships){
            return redirect()->route('student.interships')->with(['success' => "Interships Is Refused!!!"]);
        }
    }
}
