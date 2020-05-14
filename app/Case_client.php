<?php

namespace App;

use App\Cases;
use Illuminate\Database\Eloquent\Model;

class Case_client extends Model
{
    protected $fillable = [
        'case_id', 'client_id'
    ];

    public function cases()
    {
        return $this->hasMany(Cases::class,'case_id');
    }

    public function clients()
    {
        return $this->hasMany(Clients::class,'client_id');
    }

}
