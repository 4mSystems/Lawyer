<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attachment extends Model
{
    protected $table = 'attachments';
    protected $fillable = [
        'img_Url', 'img_Description', 'case_Id',
    ];


}
