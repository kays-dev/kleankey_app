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
        Schema::create('agents', function (Blueprint $table) {
            $table->uuid('agent_id')->primary();
            $table->string('agent_name');
            $table->string('agent_surname');
            $table->string('agent_mail');
            $table->string('agent_tel');
            $table->string('agent_address');
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
        Schema::dropIfExists('agents');
    }
};
