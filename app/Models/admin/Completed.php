<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Completed extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'completed';
    protected $fillable = ['video_id' ,
        'user_id',
    ];
}
