<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizoption extends Model
{
    use HasFactory;
    protected $table = 'quizze_option';
    protected $fillable = ['quizze_id', 'option_id',];
}
