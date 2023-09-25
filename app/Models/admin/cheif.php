<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class
cheif extends Model
{
    use HasFactory;
    protected $table = 'cheifs';
    protected $fillable =  [
        'first_name',
        'last_name',
        'avatar',
        'phone',
        'birth',
        'gender',
        'email',
        'center',
        'address',
    ];
}
