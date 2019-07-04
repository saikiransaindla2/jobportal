<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    //
    protected $fillable = [
        'user_id', 'name', 'address', 'mobile', 'gender', 'education', 'resume_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function availablejob(){
        return $this->belongsToMany('App\AvailableJob','applicant_available_job','applicant_id','job_id');
    }

    public function resume(){
        return $this->belongsTo('App\Resume');
    }
}
