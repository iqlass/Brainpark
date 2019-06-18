<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class branchmodel extends Model
{
    protected $table ='tbl_branch';
	 protected $primaryKey ='branch_id';
    protected $fillable = [
        'branch_name', 'is_active',
    ];
}
