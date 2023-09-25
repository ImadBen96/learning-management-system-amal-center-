<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    //
    public function delete(Request $request){
        Log::info('delete noti');

        Log::info($request->query('id'));
        if (Notification::where('id' , $request->query('id'))->where('notifiable_id' , 1)->count() > 0){
            Notification::where('id' , $request->query('id'))->where('notifiable_id' , 1) ->update(['notifiable_id' => 0]);
            return response()->json(['status' => 200 , 'result' => 'deleted']);
        }
        return response()->json(['status' => 200 , 'result' => 'nothing to delete']);

    }
    public function index(){
        $notification =   Notification::where('notifiable_id' , 1)->get();
        Log::info(json_encode($notification));
        if ($notification->count() > 0){
            return response()->json(['status' => 200 , 'data' => $notification] );
        }else{
            return response()->json(['status' => 200 , 'data' => 'no data'] );
        }
    }
    public function online(){
        $online = User::where('is_online' , true)->get();
        $offline = User::where('is_online' , false)->get();

        return response()->json(['status' => 200 , 'online' =>$online , 'offline' => $offline]);
    }
}
