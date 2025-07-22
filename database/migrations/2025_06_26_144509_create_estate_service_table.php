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
        Schema::create('estate_service', function (Blueprint $table) {
            $table->uuid('estate_id');
            $table->uuid('service_id');

            $table->primary(['estate_id','service_id']);

            $table->foreign('estate_id')->references('estate_id')->on('estates');
            $table->foreign('service_id')->references('service_id')->on('services');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estate_service');
    }
};
