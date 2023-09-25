<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\jobsRequest;
use App\Models\admin\jobs;
use App\Models\User;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index(){
        $jobs = jobs::with('users')->get();

        return view('admin.jobs_portal.index',compact('jobs'));
    }
    public function create(){
        $users = User::select('id','first_name','last_name')->where('status','is_active')->get();
        return view('admin.jobs_portal.create',compact('users'));
    }
    public function store(jobsRequest $request){
        $jobs = jobs::create([
            'student_id' => $request->student_id,
            'title' => $request->title,
            'location' => $request->location,
            'supervisor' => $request->supervisor,
            'contrat_type' => $request->contrat_type,
            'start_cdi' => $request->start_cdi,
            'start_cdd' => $request->start_cdd,
            'end_cdd' => $request->end_cdd,
            'start_anapec' => $request->start_anapec,
            'end_anapec' => $request->end_anapec,
            'informmation' => $request->editor,
            'supervisor_email' => $request->super_visor_email,
            'supervisor_phone' => $request->super_visor_phone,
            'salery' => $request->salery,
            'job_position' => $request->job_position,
            'job_contract_pas' => $request->contract_pas,
            'job_date' => 'From ' . $request->from . ' To ' . $request->to,
            'from' => $request->from,
            'to' => $request->to,
        ]);
        if ($jobs)
            return redirect()->route('admin.jobs_portal')->with(['success' => "Jobs Is Added!!!"]);

    }
    public function add_note($id){
        return $id;
    }
    public function edit($id){
        $jobs = jobs::find($id);
        $users = User::where('status','is_active')->get();
        if (!$jobs){
            return redirect()->route('admin.jobs_portal')->with(['error' => "There Is Error Please Try Again!!!"]);
        }
        return view('admin.jobs_portal.edit',compact(['jobs','users']));
    }
    public function update(jobsRequest $request,$id){
        //AFTER VALIDATION!!!
        $jobs = jobs::find($id);
        if (!$jobs){
            return redirect()->route('admin.jobs_portal')->with(['error' => "There Is Error Please Try Again!!!"]);
        }
        $jobs->update([
            'student_id' => $request->student_id,
            'title' => $request->title,
            'location' => $request->location,
            'supervisor' => $request->supervisor,
            'contrat_type' => $request->contrat_type,
            'start_cdi' => $request->start_cdi,
            'start_cdd' => $request->start_cdd,
            'end_cdd' => $request->end_cdd,
            'start_anapec' => $request->start_anapec,
            'end_anapec' => $request->end_anapec,
            'informmation' => $request->editor,
            'supervisor_email' => $request->super_visor_email,
            'supervisor_phone' => $request->super_visor_phone,
            'salery' => $request->salery,
            'job_position' => $request->job_position,
            'job_contract_pas' => $request->contract_pas,
            'job_date' => 'From ' . $request->from . ' To ' . $request->to,
            'from' => $request->from,
            'to' => $request->to,
        ]);
        if ($jobs)
            return redirect()->route('admin.jobs_portal')->with(['success' => "Jobs Is Updated!!!"]);


    }
    public function delete($id){
        $jobs = jobs::find($id);

        if (!$jobs){
            return redirect()->route('admin.jobs_portal')->with(['error' => "There Is Error Please Try Again!!!"]);
        }

        $jobs->delete();

        if ($jobs)
            return redirect()->route('admin.jobs_portal')->with(['success' => "Jobs Is Deleted!!!"]);


    }
}
