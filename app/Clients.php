<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_Name', 'client_Unit', 'client_Address', 'notes', 'type' ,'cat_id',
    ];

    public function  cat_id(){

        return $this->hasOne('App\category','id','cat_id');
        
    }

    public function getTypeAttribute($value)
    {
        if ($value == 'client') {
            return trans('site_lang.clients_client_type_client');
        } else {
            return trans('site_lang.clients_client_type_khesm');
        }
    }
}
