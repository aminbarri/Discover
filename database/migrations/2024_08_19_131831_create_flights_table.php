<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id('id_mess'); // Auto-incrementing primary key
            $table->string('name', 30); // Name with a maximum length of 30 characters
            $table->string('email', 30); // Email with a maximum length of 30 characters
            $table->string('sujet', 100); // Subject with a maximum length of 100 characters
            $table->string('content', 500); // Content with a maximum length of 500 characters
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
