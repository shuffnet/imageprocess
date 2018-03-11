<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    //

    public function get_subjects(){
        return $this->hasMany('App\Subject');
    }

    public function get_photographer(){
        return $this->hasOne('App\user', 'id', 'photographer');
    }
}
