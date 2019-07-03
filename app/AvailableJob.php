<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvailableJob extends Model
{
    //
    protected $fillable = [
        'job_name', 'experience', 'tech', 'pay_scale',
    ];
}
