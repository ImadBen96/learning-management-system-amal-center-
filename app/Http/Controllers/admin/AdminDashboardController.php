<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Admin;
use App\Models\admin\cheif;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminDashboardController extends Controller
{
    public function index(){
        $number_student  = User::where('status','=','is_active')->count();
        $chefs = cheif::count();
        $pre_registration = User::where('status','!=','is_active')->count();
        $all_pre_registrations = User::where('status','!=','is_active')->latest()->take(5)->get();
        $last_students = User::where('status','=','is_active')->latest()->take(5)->get();

//        $user = User::find(1);
//        $data = array();
//        $notifications = auth()->user()->unreadNotifications;
//        Log::info('notification');
//        Log::info(json_encode($notifications));
//        foreach ($notifications as $notification){
//            array_push($data , ['name' => $notification['data']['first_name'].' '.$notification['data']['last_name'] , 'time' => $notification['created_at']]);
//        }
//        Log::info('notification');
//        Log::info(json_encode($data));


        return view('admin.index',compact(['number_student','chefs','pre_registration','all_pre_registrations','last_students' ]));
    }
    public function adminlogout(Request $request){

        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return redirect('/login/admin');
    }

    public function edit_profile(){
        $admins = Admin::find(Auth::user()->id);

        return view('admin.edit_profile.index',compact('admins'));
    }
    public function change_profile(Request $request){
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'assets/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
            $update_profile = Admin::find(Auth::user()->id);
            $update_profile->update([
                'avatar' => $input['image'],
            ]);
        }
        ///after upload images !!
        $update_profile = Admin::find(Auth::user()->id);
        $update_profile->update([
            'email'  => $request->email,
            'name'   => $request->full_name,

        ]);
        if ($update_profile)
            return redirect()->route('edit.profile')->with(['success'=> 'Profile Is Updated!!!']);
    }
    public function change_profile_password(Request $request){
        $update_password = Admin::find(Auth::user()->id);
        if ($update_password){
            $update_password->update([
               'password' => bcrypt($request->password),
            ]);
        }
        if ($update_password){
            return redirect()->route('edit.profile')->with(['success'=> 'Password Is Updated!!!']);
        }
    }

}
