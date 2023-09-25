<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interships extends Model
{
    use HasFactory;
    protected $table = 'interships';
    protected $fillable = [ 'student_id','title','location','start','end','supervisor','objectifs','guidline','supervisor_email','supervisor_phone','status' ];

    public function users(){
        return $this->hasOne(User::class, 'id','student_id');
    }
}
