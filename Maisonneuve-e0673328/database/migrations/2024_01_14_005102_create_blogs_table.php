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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 60);
            $table->string('titre_en', 60);
            $table->text('contenu', 300);
            $table->text('contenu_en', 300);
            $table->date('date', 20);
            $table->unsignedBigInteger('user_id'); // ajout pour la relation
            $table->foreign('user_id')->references('id')->on('users'); // ajout pour la relation
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
        Schema::dropIfExists('blogs');
    }
};
