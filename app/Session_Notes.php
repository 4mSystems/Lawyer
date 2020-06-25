<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session_Notes extends Model
{
    protected $table = 'session__notes';

    protected $fillable = ['note', 'updated_by', 'status', 'session_Id'];
    protected $attributes = ['status' => 'No'];

    public function Session()
    {
        return $this->belongsTo(Sessions::class, 'session_Id');
    }

    public function getStatusAttribute($value)
    {

        if ($value == 'No') {
            return trans('site_lang.public_no_text');
        } else {
            return trans('site_lang.public_yes_text');
        }
    }

}
