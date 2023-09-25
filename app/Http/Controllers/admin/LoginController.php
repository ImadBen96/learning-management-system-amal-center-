<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminRequest;
use AWS\CRT\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
    }
    public function showAdminLoginForm(){


        return view('admin.login');
    }
    public function adminLogin(AdminRequest $request){
        $request->Adminauthenticate();
        $request->session()->regenerate();
        return redirect()->route('admin.dashboard');

    }

}
