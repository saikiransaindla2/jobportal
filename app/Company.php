<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function application(){
        return $this->hasMany('App\Application');
    }
}
