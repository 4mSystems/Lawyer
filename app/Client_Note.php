<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client_Note extends Model
{
    protected $fillable = [
        'client_id', 'notes','user_id'
    ];

    public function  user_id(){

        return $this->hasOne('App\User','id','user_id');
        
    }
}
