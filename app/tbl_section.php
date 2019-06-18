<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_section extends Model
{
     protected $table ='tbl_section';
	 protected $primaryKey ='sec_id';
    protected $fillable = [
        'sec_name','class_id','staff_id', 'is_active', 
    ];
}
