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
        Schema::create('platofrest', function (Blueprint $table) {
            $table->unsignedBigInteger('id_plat'); // Reference to the hotel, consider changing to unsignedBigInteger if your hotel ID is a big integer
            $table->unsignedBigInteger('id_rest');

            $table->foreign('id_plat')->references('id_plat')->on('plat')->onDelete('cascade');
            $table->foreign('id_rest')->references('id_rest')->on('restau')->onDelete('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
