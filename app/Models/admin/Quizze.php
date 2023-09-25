<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizze extends Model
{
    use HasFactory;
    protected $table = 'quizzes';
    protected $fillable = ['quiz_title' , 'quiz_desc' , 'score' , 'cource_id' ];
    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function options(){
        return $this->hasMany( Option::class);
    }
}
