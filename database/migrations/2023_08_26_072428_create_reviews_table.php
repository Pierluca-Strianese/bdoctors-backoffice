<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('doctor_id');
            $table->tinyInteger('valutation');
            $table->string('name');
            $table->text('review', 5000);

            $table->softDeletes();

            $table->timestamps();

            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reviews', function(Blueprint $table){
            $table->dropForeign('reviews_doctor_id_foreign');
            $table->dropColumn(('doctors_id'));
        });

    }
};
