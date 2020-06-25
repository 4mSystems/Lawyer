<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{
    protected $table = 'sessions';
    protected $fillable = ['session_date', 'case_Id', 'month', 'year', 'status'];
    protected $attributes = ['status' => 'No'];

    public function cases()
    {
        return $this->belongsTo(Cases::class, 'case_Id');
    }

    public function notes()
    {
        return $this->hasMany(Session_Notes::class, 'session_Id');
    }

    public function Printnotes()
    {
        return $this->hasOne(Session_Notes::class, 'session_Id');
    }

    public function Sessions_notes()
    {
        return $this->belongsToMany(Sessions::class, 'session_Id');
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
