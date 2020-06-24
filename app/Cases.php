<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    protected $table = 'cases';

    protected $fillable = [
        'mokel_name', 'khesm_name', 'invetation_num', 'circle_num', 'court', 'first_session_date', 'inventation_type', 'to_whome', 'month', 'year'
    ];
    protected $attributes = ['one_session_note' => ''];

    public function clients()
    {
        return $this->belongsToMany(Clients::class, 'case_clients', 'case_id', 'client_id');
    }

    public function  to_whome(){

        return $this->hasOne('App\category','id','to_whome');
        
    }
}
