<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_class extends Model
{
     protected $table ='tbl_class';
	 protected $primaryKey ='c_id';
    protected $fillable = [
        'classes','sub_category','level','price','is_active', 
    ];
}
