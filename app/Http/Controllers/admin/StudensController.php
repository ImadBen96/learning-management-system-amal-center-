<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StudensController extends Controller
{
    public function index(){
        $students = User::all();

        return view('admin.student.index',compact(['students']));
    }
    public function search(Request $request){
        $result = array();
        if ($request->ajax()){
            Log::info('it works');
            Log::info(json_encode($request->all()));
            if ($request->has('name')){
                Log::info('has name');
                $data = User::where('last_name','LIKE',$request->name.'%')->get();
                $data2 = User::where('first_name','LIKE',$request->name.'%')->get();
                foreach($data as $property => $value) {
                    Log::info($value);
                    array_push($result , $value);
                }
                foreach($data2 as $property => $value) {
                    Log::info($value);
                    if(!in_array($value , $result)){
                        array_push($result , $value);
                    }
                }

                return response()->json([ 'status' => 200 ,'data' => $result]);
            }else{
                Log::info('nothing there');
                return response()->json([ 'status' => 200 ,'data' => 'nothing there']);
            }
        }else{
            Log::info('nothing there ');
            return response()->json([ 'status' => 200 ,'data' => 'tata ops']);
        }
    }
    public function activeStudent($id){
        $active_user = User::find($id);
        $active_user->update([
            'status' => 'is_active',
        ]);
        return redirect()->route('admin.student')->with(['success' => "Student Is Activated"]);
    }
    public function InactiveStudent($id){
        $inactive_user = User::find($id);
        $inactive_user->update([
            'status' => 'is_inactive',
        ]);
        return redirect()->route('admin.student')->with(['success' => "Student Is InActivated"]);
    }
    public function GraduateStudent($id){
        $graduate_user = User::find($id);
        $graduate_user->update([
            'status' => 'graduate',
        ]);
        return redirect()->route('admin.student')->with(['success' => "Student Is Graduated"]);

    }
    public function edit($id){
        $student = User::find($id);
        return $student;
    }
}
