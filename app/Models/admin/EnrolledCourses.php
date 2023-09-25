<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrolledCourses extends Model
{
    use HasFactory;
    protected $table = 'enrolled_courses';
    protected $fillable = ['cource_id' ,
        'user_id',
       ];
}
