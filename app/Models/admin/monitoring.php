<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class monitoring extends Model
{
    use HasFactory;
    protected  $table = 'monitorings';
    protected $fillable = ['student_id','service','supervisor','start','end','note','supervisor_email','supervisor_phone'];
    public function users(){
        return $this->hasOne(User::class,'id','student_id');
    }
    public function services(){
        return $this->hasOne(Service::class,'id','service');
    }
}
