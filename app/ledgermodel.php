<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ledgermodel extends Model
{
     protected $table ='tbl_ledger';
	 protected $primaryKey ='ledger_id';
    protected $fillable = [
        'ledger_name', 'is_active',
    ];
}
