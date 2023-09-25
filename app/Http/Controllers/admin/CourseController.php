<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\PodCast;

use App\Models\admin\Quizze;
use App\Models\Materiels;
use App\Models\Video;
use App\Models\VideoDetails;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Dcblogdev\Dropbox\Facades\Dropbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Log;
use  Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Predis;
use App\Models\admin\Cource;
use Ramsey\Uuid\Uuid;
use function React\Promise\reduce;

class CourseController extends Controller
{
    public function index(){
        $cources = Cource::all();

        return view('admin.courses.index');
    }
    public function search(Request $request){

    }
    public function allVideos(){
        return view('admin.videos.index');
    }
    public function createVideo(){
        return view('admin.videos.create');
    }
    public function storenewCource(Request  $request) {
        $videos = implode(', ',$request->videos);
        $newvideos = str_replace('public', 'storage', $videos);

        $podcasts = implode(", ",$request->podcasts);
        $newpodcasts = str_replace('public', 'storage', $podcasts);

        $materiels = implode(', ', $request->materiels);
        $newmeteriels = str_replace('public', 'storage', $materiels);

        $imageName = time().'.'.$request->image->extension();
         $request->image->storeAs('public/images', $imageName);


        $cource = Cource::create([
            'cource_title' => $request->course_name,
            'thumbline' => $imageName,
            'instructor' => $request->quizz_category,
            'descr' => $request->description,
            'videos' => $newvideos,
            'podcasts' => $newpodcasts,
            'materiels' => $newmeteriels,

        ]);


        return redirect() ->route('admin.course.index');

    }
    public function create(){
      $videos = Video::all();
      $podcasts = Podcast::all();
      $materiels = Materiels::all();

        return view('admin.courses.newcreate' ,
        [
            'videos' => $videos,
            'podcasts' => $podcasts,
            'materiels' => $materiels
        ]);
    }
    public function storeCourseThumn(Request $request){
     Log::info(json_encode($request->all()));
    }
    public function storeCourseIntro(Request $request){
     Log::info(json_encode($request->all()));
    }

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \Exception
     */
    public function storeCource(Request $request){

        return "hello";

        $video = new Video();
        if ($request->has('courseTitle')){
            Log::info('courseTitle');
            $video->videoCourseTitle = $request->get('courseTitle');
        }
        if ($request->has('courseTeacher')){
            Log::info('courseTeacher');
            $video->instructor = $request->get('courseTeacher');
        }
        if ($request->has('course_descreption')){
            Log::info('course_descreption');
        }
        if ($request->has('courseThumbs')){
            Log::info('courseThumbs');
            if ( $request->courseThumbs != null){
                $path = $request->courseThumbs->store('videoThumbs' , 'do-spaces' , 'public');
                $video->thumbs = 'https://amalcenter.nyc3.cdn.digitaloceanspaces.com/'.$path;
            }else{
                $video->thumbs  = $request->courseThumbs->storeOnCloudinaryAs('courseThumbs')->getPath();
            }

        }
        if ($request->has('course')){
            Log::info('course');
            $video->videoCourceUrl = $request->get('course');
        }
        if ($request->has('videoDuration')){
            Log::info('videoDuration');
            $video->duration = $request->get('videoDuration');
        }
        $video->save();

        return response()->json([
            'success'=>'Got Simple Ajax Request.',
            'data' => $request->all(),
        ]);

    }
    public function storeVideo(Request $request){


        /** @var UploadedFile[] $files */
        $files = $request->allFiles();
        if (empty($files)) {
            abort(422, 'No files were uploaded.');
        }

        if (count($files) > 1) {
            abort(422, 'Only 1 file can be uploaded at a time.');
        }
        // the file from the request.
        $requestKey = array_key_first($files);

        $file = is_array($request->input($requestKey))
            ? $request->file($requestKey)[0]
            : $request->file($requestKey);

        return $file->store(
            path: 'public/'.now()->timestamp.'-'.Str::random(20)
        );



    }
    public function deleteVideo(Request $request ){
            Log::info('the delete place');
            $payLoad = json_decode($request->getContent(), true);
            Log::info($payLoad['result']);
            $path = str_replace('https://amalcenter.nyc3.cdn.digitaloceanspaces.com/' ,'',$payLoad['result'] );
            if ( Storage::disk('do-spaces')->exists($path)){
                Storage::disk('do-spaces')->delete($payLoad['result']);
                return response()->json(['status' => 200 , 'result' => 'deleted ']);
            }else{
                return response()->json(['status' => 200 , 'result' => 'video not deleted ']);
            }


    }
    }
