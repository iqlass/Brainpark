<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_attendance extends Model
{
     protected $table ='tbl_attendance';
	 protected $primaryKey ='att_id';
    protected $fillable = [
        'stu_id', 'date','attendance', 
    ];
}
