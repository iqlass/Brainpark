<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subledger extends Model
{
    protected $table ='tbl_subledger';
	 protected $primaryKey ='subledger_id';
    protected $fillable = [
        'ledger_id','subledger_name', 'is_active',
    ];
}
