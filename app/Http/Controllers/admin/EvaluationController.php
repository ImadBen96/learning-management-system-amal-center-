<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\EvaluationRequest;
use App\Models\admin\monitoring;
use App\Models\admin\Service;
use App\Models\User;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index(){
        $monitorings = monitoring::with('users')->get();


        return view('admin.evaluation.index',compact('monitorings'));
    }
    public function create(){
        $users = User::where('status','is_active')->get();
        return view('admin.evaluation.create',compact('users'));
    }
    public function store(EvaluationRequest $request){
        //AFTER VALIDATION
        $monitorings = monitoring::create([
            'student_id' => $request->student_id,
            'service' => $request->service,
            'supervisor' => $request->Supervisor,
            'start' => $request->start,
            'end' => $request->end,
        ]);
        if ($monitorings){

            return redirect()->route('admin.evaluation.index')->with(['success' => "monitorings Is Added!!!"]);

        }
    }
    public function edit($id){
        $monitorings = monitoring::find($id);
        $users = User::where('status','is_active')->get();
        return view('admin.evaluation.edit',compact(['monitorings','users']));
    }
    public function update(EvaluationRequest $request,$id){
        $monitorings = monitoring::find($id);

        $monitorings->update([
            'student_id' => $request->student_id,
            'service' => $request->service,
            'supervisor' => $request->Supervisor,
            'start' => $request->start,
            'end' => $request->end,
        ]);
        if ($monitorings){

            return redirect()->route('admin.evaluation.index')->with(['success' => "monitorings Is Updated!!!"]);

        }
    }
    public function delete($id){
        $monitorings = monitoring::find($id);
        $monitorings->delete();

        return redirect()->route('admin.evaluation.index')->with(['success' => "monitorings Is Deleted!!!"]);


    }
    public function add_note_finale(Request $request){

        $id = $request->id;
        $note = $request->note;
        $monitorings = monitoring::find($id);

        $monitorings->update([
            'note' => $note,
        ]);

        return redirect()->route('admin.evaluation.index')->with(['success' => "Note Is Added!!!"]);


    }
    public function allservices(){
        $services = Service::all();
        return view('admin.evaluation.servies_index',compact('services'));
    }
    public function create_services(){
        return view('admin.evaluation.servies_create');
    }
    public function store_services(Request $request){
        $servies = Service::create([
            'service_name' => $request->service_name,
        ]);
        if ($servies){
            return redirect()->route('admin.services.index')->with(['success' => "Service Is Added!!!"]);

        }
    }
    public function delete_services($id){
        $services = Service::find($id);
        $services->delete();

        return redirect()->route('admin.services.index')->with(['success' => "Service Is Deleted!!!"]);

    }
    public function edit_services($id){
        $services = Service::find($id);

        return view('admin.evaluation.servies_edit',compact('services'));
    }
    public function update_services(Request $request,$id){
        $services = Service::find($id);
        $services->update([
            'service_name' => $request->service_name,
        ]);
        if ($services){
            return redirect()->route('admin.services.index')->with(['success' => "Service Is Updated!!!"]);

        }
    }
}
