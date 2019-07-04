<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    //
    protected $fillable = ['file']; 

    public function applicant()
    {
        return $this->hasOne('App\Applicant');
    }

}
