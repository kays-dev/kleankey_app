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
        Schema::create('cities', function (Blueprint $table) {
            //Colonnes
            $table->uuid('city_id')->primary();
            $table->string('city_code')->unique();
            $table->string('city_name')->unique();
            $table->string('postcode', 7)->unique();
            $table->string('region');
            $table->timestamps();

            //Clé étrangère
            $table->uuid('zone_id');
            $table->foreign('zone_id')->references('zone_id')->on('zones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
