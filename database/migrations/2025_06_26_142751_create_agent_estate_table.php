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
        Schema::create('agent_estate', function (Blueprint $table) {
            $table->uuid('agent_id');
            $table->uuid('estate_id');

            $table->primary(['agent_id','estate_id']);

            $table->foreign('agent_id')->references('agent_id')->on('agents');
            $table->foreign('estate_id')->references('estate_id')->on('estates');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_estate');
    }
};
