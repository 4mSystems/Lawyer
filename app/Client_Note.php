<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client_Note extends Model
{
    protected $fillable = [
        'client_id', 'notes' 
    ];
}
