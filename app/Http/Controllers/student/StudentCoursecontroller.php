<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\admin\Completed;
use App\Models\admin\Cource;
use App\Models\admin\EnrolledCourses;
use App\Models\admin\Option;
use App\Models\admin\Question;
use App\Models\Video;
use http\Env\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class StudentCoursecontroller extends Controller
{
    //
    protected $cources ;
    protected $videos ;
    protected $podcast;
    protected $quizzes;
    public function show(Request $request ){

    }
    public function index(){
        Log::info('the course views');
        return view('student.student_cources');
    }
    public function enroll(Request $request){
        $memo = array();
        foreach (Video::all() as $vid){
            array_push($memo , $vid->id);
        }
        Log::info('enroll');
        $video_id = $request->query('id');
        $user_id = $request->query('user_id');
        Log::info($request->query('id'));
        Log::info($request->query('user_id'));
        Log::info(json_encode($request));
        if (EnrolledCourses::all()->where('video_id' , $video_id)->where('user_id' , $user_id)->count() == 1){
            return response()->json(['status' => 200 , 'result' => true , 'lock' => 'not change']);
        }else{
            if (array_search($video_id , $memo) === 0){
                $enroll = new EnrolledCourses();
                $enroll->video_id = $video_id;
                $enroll->user_id = $user_id;
                $enroll->save();
                return response()->json(['status' => 200 , 'result' => true , 'lock' => 'not change']);
            }else{
                $previous = Video::where('id', intval($video_id) - 1)->get();
                Log::info('previous');
                if (EnrolledCourses::all()->where('video_id' , $previous[0]->id)->where('user_id' , $user_id)->count() > 0){
                    $enroll = new EnrolledCourses();
                    $enroll->video_id = $video_id;
                    $enroll->user_id = $user_id;
                    $enroll->save();
                    return response()->json(['status' => 200 , 'result' => true , 'lock' => 'change']);
                }else{
                    return response()->json(['status' => 200 , 'result' => false , 'lock' => 'not change']);
                }
            }
        }




    }
    public function complete(Request $request){
          Log::info('course completed');
          Log::info($request->get('id'));
          $video_id = $request->get('id');
          $user_id = $request->get('user_id');
          if (Completed::all()->where('user_id' , $user_id)->where('video_id' , $video_id)->count() > 0){
              return response()->json(['status' => 200 , 'result' => 'exist']);
          }else{
              $completed = new Completed();
              $completed->user_id = $user_id ;
              $completed->video_id = $video_id;
              $completed->save();
              return  response()->json(['status' => 200 , 'result' => 'just existed']);
          }
    }


}
