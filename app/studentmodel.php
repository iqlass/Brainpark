<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentmodel extends Model
{
    protected $table ='tbl_student';
	 protected $primaryKey ='stu_id';
    protected $fillable = [
        'reg_no','stu_name','dob','age','Address','mailid','contectno1','contectno2','coruse','level','batch','price','paytype','paymode','response','payment_status','is_active', 
    ];
}
