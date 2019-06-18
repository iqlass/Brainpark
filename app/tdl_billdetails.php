<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tdl_billdetails extends Model
{
    protected $table ='tdl_billdetail';
	 protected $primaryKey ='b_id';
    protected $fillable = [
        'bill_id','product_id','qty','price','total','is_active', 
    ];
}
