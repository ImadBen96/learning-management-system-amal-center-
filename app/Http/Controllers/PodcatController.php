<?php

namespace App\Http\Controllers;

use App\Models\admin\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PodcatController extends Controller
{
    public function index() {
        return view('admin.podcasts.index');
    }
    public function store(Request  $request){
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

    public function storeInfoPodCast(Request  $request){
        $podCast = Podcast::create([
            'podcastName' => $request->podcastTitle,
            'podcastUrl' => $request->podcastUrl,
            'podcastOrder' => 1
        ]);
    }
    public function create(){
        return view('admin.podcasts.create');
    }
}
