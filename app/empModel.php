<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empModel extends Model
{
	 protected $table ='tbl_users';
	 protected $primaryKey ='e_id';
    protected $fillable = [
        'emp_id', 'emp_name', 'emp_designation','emp_dob','emp_gender','emp_address','emp_username','emp_pwd','emp_mobile','emp_photo','emp_email','is_active','User_type'
    ];
}
