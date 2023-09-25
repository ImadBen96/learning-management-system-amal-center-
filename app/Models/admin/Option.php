<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $table = 'options';
    protected $fillable = [
      'id',
        'nbr_options',
        'type_option',
        'content',
        'content_image',
        'isCorrect',
    ];
}
