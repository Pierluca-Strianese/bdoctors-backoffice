<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up()
    {
        Schema::create('doctor_promotion', function (Blueprint $table) {
            // $table->integer('duration')->nullable()->default(30);
            $table->date('subscription_date')->nullable();
            $table->date('expiration_date')->nullable(); 


            $table->unsignedBigInteger('promotion_id');
            $table->unsignedBigInteger('doctor_id');


            $table->foreign('promotion_id')->references('id')->on('promotions')->onDelete('cascade');;
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');;
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('doctor_promotion');
    }
};
