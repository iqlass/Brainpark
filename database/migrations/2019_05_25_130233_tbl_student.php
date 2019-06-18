<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_student', function (Blueprint $table) {
            $table->bigIncrements('stu_id');
             $table->string('reg_no');
            $table->string('stu_name');
            $table->string('dob');
            $table->integer('age');
            $table->string('Address');
            $table->string('mailid');
            $table->string('contectno1');
            $table->string('contectno2');
            $table->string('coruse');
            $table->string('level');
			$table->string('is_active');
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
          Schema::dropIfExists('tbl_student');
    }
    
}
