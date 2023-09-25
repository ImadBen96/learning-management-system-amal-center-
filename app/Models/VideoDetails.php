<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoDetails extends Model
{
    use HasFactory;
    protected  $table = 'videotapes';
    protected  $fillable = [
        'videoLinkDigitalOcean',
        'name',
    ];
}
