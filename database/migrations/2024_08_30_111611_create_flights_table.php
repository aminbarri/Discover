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
        Schema::create('plat', function (Blueprint $table) {
            $table->id('id_plat'); // Primary key
            $table->string('nom', 100); // Nom with max length 100
            $table->string('description', 1000); // Description with max length 1000
            $table->string('img1', 255); // Image 1 path with max length 255
            $table->string('img2', 255); // Image 2 path with max length 255
            $table->string('img3', 255); // Image 3 path with max length 255
            $table->unsignedBigInteger('id_user'); // Adjust the column type if `id_user` is a different type
            $table->foreign('id_user ')->references('id')->on('users')->onDelete('cascade'); // Assuming you have a `users` table
            $table->timestamps(); // created_at and updated_at columns

        });
    }

    
    public function down()
    {
        Schema::dropIfExists('plat');
    }
};
