<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class file extends Model
{
    protected $fillable =[
        'name',
        'size',
        'file'
        ,'path'
        ,'full_fill'
        ,'mime_type'
        ,'file_type'
        ,'relation_id'
    ];

}
