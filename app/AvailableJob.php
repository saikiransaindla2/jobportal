<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvailableJob extends Model
{
    //
    protected $fillable = [
        'job_name', 'experience', 'tech', 'company_id', 'pay_scale',
    ];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function applicant(){
        return $this->belongsToMany('App\Applicant','applicant_available_job','job_id','applicant_id')->withPivot('status');
    }
}
