<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    public function get_session(){
        return $this->hasOne('App\Session', 'id', 'session_id');
    }
}
