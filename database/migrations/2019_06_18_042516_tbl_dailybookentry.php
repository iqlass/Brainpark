<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblDailybookentry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dailybookentry', function (Blueprint $table) {
            $table->bigIncrements('entry_id');
             $table->string('subledger_id');
             $table->string('date');
             $table->string('paymenttype');
             $table->string('amount');
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
         Schema::dropIfExists('tbl_dailybookentry');
    }
}
