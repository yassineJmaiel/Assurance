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
        Schema::create('reponse_demandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('remboursement_id')->nullable();
            $table->foreign('remboursement_id')
                  ->references('id')
                  ->on('remboursements')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('assurer_id')->nullable();
            $table->foreign('assurer_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            
            $table->string('status');
            $table->string('commentaire')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reponse_demandes');
    }
};
