<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use AWS\CRT\Log;
use Illuminate\Http\Request;

class PdfCpntroller extends Controller
{
    //
    public function createPdf(Request $request){
        if ($request->has('html')){
            \Illuminate\Support\Facades\Log::info($request->get('html'));
        }else{
            \Illuminate\Support\Facades\Log::info('that good pdf');
        }
    }
}
