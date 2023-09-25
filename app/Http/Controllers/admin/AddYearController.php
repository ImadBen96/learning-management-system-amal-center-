<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Custom_class\ArchiveYearDb;

class AddYearController extends Controller
{
    public $add ;
    public function addYear(){
        $add = new ArchiveYearDb ;
        $add->incrementYear() ;
        dd($add->thus);

    }
}
