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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('doctor_id');
            $table->string('email', 40);
            $table->text('text', 5000);

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
        Schema::table('messages', function(Blueprint $table){
            $table->dropForeign('messages_doctors_id_foreign');
            $table->dropColumn(('doctor_id'));
        });

        // Schema::table('messages', function(Blueprint $table){
        //     $table->dropForeign(['doctor_id']); // Rimuovi la chiave esterna correttamente
        //     $table->dropColumn('doctor_id'); // Rimuovi il campo correttamente
        // });

    }
};
