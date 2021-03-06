<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable = [
        'user_id', 'name', 'about', 'address', 'contact',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function availablejob(){
        return $this->hasMany('App\AvailableJob');
    }
}
