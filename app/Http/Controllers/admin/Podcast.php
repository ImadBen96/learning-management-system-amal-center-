<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use AWS\CRT\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Podcast extends Controller
{
    //
    public function index(){

    }
    public function show(){
        return view('admin.podcasts.create');
    }
    public function create(Request $request){
        if ($request->hasFile('filepondPodcast')){
            $path = $request->filepondPodcast->store('amalPodcasts' , 'do-spaces' , 'public') ;;
            return response()->json(['status' => 200 , 'result' => 'https://amalcenter.nyc3.cdn.digitaloceanspaces.com/'.$path]);
        }


    }

    public function fetch(){
           return view('admin.podcasts.index');
    }
    public function storePodcast(Request $request){
        $podcast = new \App\Models\admin\PodCast();
          if ($request->has('podcastTitle')){
              $podcast->podcastName = $request->get('podcastTitle');
          }
        if ($request->has('podcastUrl')){
            $podcast->podcastUrl = $request->get('podcastUrl');
        }
        $podcast->podcastOrder = 96;
        $podcast->save();
        return response()->json(['status' => 200 , 'message' => 'updated']);
    }
    public function delete(Request $request){
        \Illuminate\Support\Facades\Log::info('delete podcast');
        $payLoad = json_decode($request->getContent(), true);
        \Illuminate\Support\Facades\Log::info($payLoad['result']);
        $path = str_replace('https://amalcenter.nyc3.cdn.digitaloceanspaces.com/' ,'',$payLoad['result'] );
        if ( Storage::disk('do-spaces')->exists($path)){
            Storage::disk('do-spaces')->delete($payLoad['result']);
            return response()->json(['status' => 200 , 'result' => 'deleted ']);
        }else{
            return response()->json(['status' => 200 , 'result' => 'video not deleted ']);
        }
    }
}
