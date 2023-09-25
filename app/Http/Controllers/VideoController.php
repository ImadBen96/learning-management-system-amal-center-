<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use  Illuminate\Http\UploadedFile;

class VideoController extends Controller
{
    public function index(){
        $videos = Video::all();
        return view('admin.videos.index',
        [
            'videos' => $videos
        ]);
    }
    public function create(){
        return view('admin.videos.create');
    }
    public function store(Request $request){

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


    public function allstore(Request  $request) {
        $video = Video::create([
            'videoCourseTitle'=>$request->videoTitle,
            'videoCourceUrl'=>$request->videoUrl,
            'duration'=> 1,
            'instructor'=> 'imad',
            'thumbs'=> 'non',
        ]);
    }
}
