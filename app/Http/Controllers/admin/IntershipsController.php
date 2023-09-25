<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\IntershipsRequest;
use App\Models\admin\Interships;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IntershipsController extends Controller
{
    public function index(){
        $interships = Interships::with('users')->get();

        return view('admin.internship.index',compact('interships'));
    }
    public function create(){
        $users = User::select('id','first_name','last_name')->where('status','is_active')->get();
        return view('admin.internship.create',compact('users'));
    }
    public function store(IntershipsRequest $request){

        $interships = Interships::create([
           'student_id' => $request->student_id,
           'title' => $request->title,
           'location' => $request->location,
           'start' => $request->start,
           'end' => $request->end,
           'supervisor' => $request->supervisor,
           'objectifs' => $request->editor,
           'guidline' => $request->guidline,
           'supervisor_email' => $request->supervisor_email,
           'supervisor_phone' => $request->supervisor_phone,
        ]);
        if ($interships)
            return redirect()->route('admin.interships')->with(['success' => "Interships Is Added!!!"]);


    }
    public function edit($id){
         $interships = Interships::find($id);
         $users = User::select('id','first_name','last_name')->where('status','is_active')->get();


        if (!$interships){
             return redirect()->route('admin.interships')->with(['error' => "There Is Error Please Try Again!!"]);
         }
         return view('admin.internship.edit',compact(['interships','users']));
    }
    public function update(IntershipsRequest $request,$id){
        $interships = Interships::find($id);
        if (!$interships){
            return redirect()->route('admin.interships')->with(['error' => "There Is Error Please Try Again!!"]);
        }
        $interships->update([
            'student_id' => $request->student_id,
            'title' => $request->title,
            'location' => $request->location,
            'start' => $request->start,
            'end' => $request->end,
            'supervisor' => $request->supervisor,
            'objectifs' => $request->editor,
            'guidline' => $request->guidline,
            'supervisor_email' => $request->supervisor_email,
            'supervisor_phone' => $request->supervisor_phone,
        ]);
        if ($interships){
            return redirect()->route('admin.interships')->with(['success' => "Interships Is Updated!!!"]);
        }
    }
    public function delete($id){
        $interships = Interships::find($id);

        if (!$interships){
            return redirect()->route('admin.interships')->with(['error' => "There Is Error Please Try Again!!"]);
        }

        $interships->delete();

        if ($interships){
            return redirect()->route('admin.interships')->with(['success' => "Interships Is Deleted!!!"]);
        }
    }
}
