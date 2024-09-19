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
        Schema::create('restau', function (Blueprint $table) {
            $table->id('id_rest');
            $table->string('nom', 100);
            $table->string('ville', 100);
            $table->string('province', 100);
            $table->text('description');
            $table->string('location', 1000);
            $table->string('img1', 255)->nullable();
            $table->string('img2', 255)->nullable();
            $table->string('img3', 255)->nullable();
            $table->string('carte', 1000);  $table->unsignedBigInteger('user_id'); // Foreign key to users table
            // other columns
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('date_add')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restau');
    }
};
