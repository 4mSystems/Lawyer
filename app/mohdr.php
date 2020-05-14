<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mohdr extends Model
{
    protected $primaryKey = "moh_Id";
    protected $fillable = [
        'moh_id', 'court_mohdareen', 'paper_type', 'deliver_data', 'paper_Number', 'session_Date', 'mokel_Name', 'khesm_Name', 'case_number'
    ];
}
