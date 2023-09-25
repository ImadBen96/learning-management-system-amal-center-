<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiels extends Model
{
    use HasFactory;
    protected  $table = 'materiels';
    protected  $fillable = [
        'mat_title',
        'mat_description',
        'file_location',
        'file_ext',
        'cource_id',
    ];
}
