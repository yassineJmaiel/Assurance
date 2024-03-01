<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assurers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('assureur_id'); 
        $table->foreign('assureur_id')->references('id')->on('users');
        $table->string('nomPrenom');
        $table->date('dateNaissance');
        $table->string('email');
        $table->string('telephone');
        $table->text('adresse');
        $table->string('cin');
        $table->string('situation');
        $table->string('genre');
        $table->string('typeAssurance');
        $table->string('numeroContrat');
        $table->date('dateDebutContrat');
        $table->date('dateFinContrat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assurers');
    }
};
