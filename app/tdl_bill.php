<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tdl_bill extends Model
{
     protected $table ='tdl_bill';
	 protected $primaryKey ='bill_id';
    protected $fillable = [
        'bill_no','batch','student_id','date','total','is_active', 
    ];
}
