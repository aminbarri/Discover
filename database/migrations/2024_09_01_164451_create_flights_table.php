<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reservation_hotel', function (Blueprint $table) {
            $table->id('id_resh'); // Auto-incrementing primary key
            $table->unsignedBigInteger('id_hotel'); // Reference to the hotel, consider changing to unsignedBigInteger if your hotel ID is a big integer
            $table->unsignedBigInteger('id_client'); // Reference to the client, consider changing to unsignedBigInteger if your client ID is a big integer
            $table->string('phone', 90); // Phone number field with a maximum length of 90 characters
            $table->enum('type', ['partagé', 'seul']); // Enum for type of reservation
            $table->integer('nmbre_perssone'); // Number of people field
            $table->date('date_debut'); // Start date of the reservation
            $table->date('date_fin'); // End date of the reservation
            $table->date('date_reservartion'); // Date of reservation
            $table->enum('statu', ['En cours', 'Acceptée', 'Refusée']); // Enum for status of the reservation
            $table->timestamps(); // created_at and updated_at timestamp fields

            $table->foreign('id_hotel')->references('id_hotel')->on('hotels')->onDelete('cascade');
            $table->foreign('id_client')->references('id')->on('users')->onDelete('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resh');
    }
};
