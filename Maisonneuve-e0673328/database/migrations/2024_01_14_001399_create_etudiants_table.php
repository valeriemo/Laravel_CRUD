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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 45);
            $table->string('adresse', 150);
            $table->string('telephone', 25);
            $table->string('email', 60)->unique();
            $table->string('date_naissance', 20);
            $table->unsignedBigInteger('ville_id');
            $table->unsignedBigInteger('user_id'); // ajout pour la relation
            $table->foreign('user_id')->references('id')->on('users'); // ajout pour la relation
            $table->foreign('ville_id')->references('id')->on('villes');
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
        Schema::dropIfExists('etudiants');
    }
};
