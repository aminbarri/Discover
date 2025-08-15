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
        Schema::create('voyage', function (Blueprint $table) {
            $table->id('id_voy'); // This will create an auto-incrementing `id` column
            $table->string('ville_depart', 255);
            $table->string('ville_arrive', 255);
            $table->text('trajet'); // `varchar(10000)` can be represented as `text`
            $table->date('date_depart');
            $table->time('heure_depart');
            $table->integer('dure');
            $table->string('img', 1000)->nullable();
            $table->string('carte', 1000);
            $table->decimal('prix', 65, 0);
            $table->date('date_res');
            $table->timestamp('date_creation')->useCurrent(); // Adjust if needed
            $table->unsignedBigInteger('id_user'); // Adjust the column type if `id_user` is a different type

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade'); // Assuming you have a `users` table

            $table->timestamps(); // This will create `created_at` and `updated_at` columns

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voyage');
    }
};
