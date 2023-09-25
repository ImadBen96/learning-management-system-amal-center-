<?php

namespace App\Models\admin;

use App\Models\Materiels;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;


class Cource extends Model
{
    use HasFactory , MediaAlly;
    protected  $table = 'cources';
    protected  $fillable = [
        'cource_title',
        'thumbline',
        'instructor',
        'descr',
        'videos',
        'podcasts',
        'materiels',

        ];
    /* many quizzes */
    public function quizzes(){
        return $this->hasMany(Quizze::class);
    }
    public function  videos(){
        return $this->hasMany(Video::class);
    }
    public  function  podcasts(){
        return $this->hasMany(PodCast::class);
    }
    public function materials(){
        return $this->hasMany(Materiels::class);
    }
}
