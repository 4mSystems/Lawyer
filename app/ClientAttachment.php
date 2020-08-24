<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientAttachment extends Model
{
    protected $fillable = [
        'img_Url', 'img_Description', 'client_Id',
    ];

    public function  getClient(){

        return $this->hasOne('App\Clients','id','client_Id');
        
    }
}
