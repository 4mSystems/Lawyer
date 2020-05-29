<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session_Notes extends Model
{
    protected $table = 'session__notes';

    protected $fillable = ['note', 'updated_by', 'status', 'session_Id'];
    protected $attributes = ['status' => 'لا'];

    public function Session()
    {
        return $this->belongsTo(Sessions::class, 'session_Id');
    }


}
