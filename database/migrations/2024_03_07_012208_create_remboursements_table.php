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
        Schema::create('remboursements', function (Blueprint $table) {
            $table->timestamps();
            $table->id();
            $table->unsignedBigInteger('id_membre')->nullable();
            $table->foreign('id_membre')->references('id')->on('membre_familles');
            $table->unsignedBigInteger('assurer_id'); 
        $table->foreign('assurer_id')->references('id')->on('users')->onDelete('cascade');;
            $table->string('nom_prestataire')->nullable();
            $table->date('date_service');
            $table->string('medecin');
            $table->decimal('montant');
            $table->string('status')->default("en cours");

            $table->decimal('montant_total')->nullable();
            $table->string('piece_jointe')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remboursements');
    }
};
