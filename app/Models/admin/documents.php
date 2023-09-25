<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documents extends Model
{
    use HasFactory;
    protected $table = 'documents';
    protected $fillable = ['user_id' ,
            'doc_name',
            'string_url',
             'doc_type',];
}
