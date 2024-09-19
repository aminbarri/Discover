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
        Schema::create('destination', function (Blueprint $table) {
            $table->increments('id_des'); // Auto-increment primary key
            $table->string('nom', 100);
            $table->string('ville', 90);
            $table->string('province', 100);
            $table->string('description', 10000);
            $table->string('location', 5000);
            $table->string('img1', 255)->nullable();
            $table->string('img2', 255)->nullable();
            $table->string('img3', 255)->nullable();
            $table->timestamp('date_modification')->useCurrent();
            $table->unsignedBigInteger('id_user');

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destination');
    }
};
