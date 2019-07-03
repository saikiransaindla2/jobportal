<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    //
    protected $fillable = [
        'user_id', 'name', 'address', 'mobile', 'gender', 'education'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
