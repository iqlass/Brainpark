<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_metirial extends Model
{
     protected $table ='tbl_metirial';
	 protected $primaryKey ='met_id';
    protected $fillable = [
        'met_name','met_dis','met_image','met_price', 'is_active', 
    ];
}
