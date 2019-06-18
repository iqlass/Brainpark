<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dailybookentrymodel extends Model
{
     protected $table ='tbl_dailybookentry';
	 protected $primaryKey ='entry_id';
    protected $fillable = [
        'subledger_id','date','paymenttype','amount', 'is_active',
    ];
}
