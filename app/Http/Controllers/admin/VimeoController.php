<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Vimeo\Laravel\Facades\Vimeo;
use Vimeo\Laravel\VimeoManager;

class VimeoController extends Controller
{
    protected $vimeo;

    public function __construct(VimeoManager $vimeo)
    {
        $this->vimeo = $vimeo;
    }

    public function showPage(){
       return view('video');
   }
   public function addVideo(Request $request ){
     $url =Vimeo::upload($request->video_path) ;
     dd($url);
       //$array = $request->request;
        //dd($array);
   }
}
