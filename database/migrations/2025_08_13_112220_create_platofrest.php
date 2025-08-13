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
            $table->unsignedBigInteger('id_plat');
            $table->unsignedBigInteger('id_rest');

            // Add soft deletes column
            $table->timestamp('deleted_at')->nullable();

            // Set composite primary key
            $table->primary(['id_plat', 'id_rest']);

            // Foreign key constraints
            $table->foreign('id_plat')->references('id_plat')->on('plat')->onDelete('cascade');
            $table->foreign('id_rest')->references('id_rest')->on('restau')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platofrest'); // Fixed: was 'flights'
    }
};
