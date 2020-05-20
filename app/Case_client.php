<?php

namespace App;

use App\Cases;
use Illuminate\Database\Eloquent\Model;

class Case_client extends Model
{
    protected $fillable = [
        'case_id', 'client_id'
    ];

    public function case()
    {
        return $this->belongsTo(Cases::class,'case_id');
    }

    public function client()
    {
        return $this->belongsTo(Clients::class,'client_id');
    }

}
