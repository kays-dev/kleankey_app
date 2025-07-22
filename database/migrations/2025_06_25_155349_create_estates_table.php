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
        Schema::create('estates', function (Blueprint $table) {
            //Colonnes
            $table->uuid('estate_id')->primary();
            $table->string('estate_code')->unique();
            $table->string('estate_address')->unique();
            $table->enum('estate_type',['','appartement','maison'])->default('');
            $table->integer('rooms_number');
            $table->decimal('surface', 8, 2)->nullable();
            $table->timestamps();

            //Clés étrangères
            $table->uuid('zone_id')->nullable();
            $table->foreign('zone_id')->references('zone_id')->on('zones');
            
            $table->uuid('owner_id')->nullable();
            $table->foreign('owner_id')->references('owner_id')->on('owners');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estates');
    }
};
