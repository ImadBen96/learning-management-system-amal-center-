<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizquestion extends Model
{
    use HasFactory;
    protected $table = 'quizze_question';
    protected $fillable = ['quizze_id' , 'question_id',];
}
