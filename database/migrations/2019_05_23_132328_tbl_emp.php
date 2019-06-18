<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblEmp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('tbl_users', function (Blueprint $table) {
            $table->bigIncrements('e_id');
            $table->string('emp_id');
            $table->string('emp_name');
            $table->string('emp_designation');
            $table->string('emp_dob');
            $table->string('emp_gender');
            $table->string('emp_address');
            $table->string('emp_username');
            $table->string('emp_pwd');
            $table->string('emp_mobile');
            $table->string('emp_photo');
            $table->string('is_active');
            $table->string('User_type');
            $table->string('emp_email')->unique();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('tbl_users');
    }
}
