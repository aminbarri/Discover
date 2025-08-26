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
        Schema::table('hotels', function (Blueprint $table) {
            $table->boolean('living_room')->nullable()->after('prix');
            $table->boolean('kitchen')->nullable()->after('prix');
            $table->boolean('free_parking')->nullable()->after('prix');
            $table->boolean('swimming_pool')->nullable()->after('prix');
            $table->boolean('refrigerator')->nullable()->after('prix');
            $table->boolean('pets_allowed')->nullable()->after('prix');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hotels', function (Blueprint $table) {
            //
        });
    }
};
