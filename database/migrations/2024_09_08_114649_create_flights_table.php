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
        Schema::create('travelRes', function (Blueprint $table) {
            $table->id('id_vor');
            $table->unsignedBigInteger('id_voyage');
            $table->unsignedBigInteger('id_client');
            $table->string('phone', 90);
            $table->integer('nmbre_perssone');
            $table->timestamps();

            $table->foreign('id_voyage')->references('id_voy')->on('voyage')->onDelete('cascade');
            $table->foreign('id_client')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travelRes');
    }
};
