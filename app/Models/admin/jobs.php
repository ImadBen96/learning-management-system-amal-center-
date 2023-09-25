<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobs extends Model
{
    use HasFactory;
    protected $table = 'jobs';
    protected $fillable = [
        'student_id',
        'title',
        'location',
        'supervisor',
        'contrat_type',
        'start_cdi',
        'start_cdd',
        'end_cdd',
        'start_anapec',
        'end_anapec',
        'informmation',
        'supervisor_email',
        'supervisor_phone',
        'salery',
        'job_position',
        'job_contract_pas',
        'job_date',
        'status',
        'from',
        'to',

    ];
    public function users(){
        return $this->hasOne(User::class, 'id','student_id');

    }
}
