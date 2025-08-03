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
        Schema::create('services', function (Blueprint $table) {
            $table->uuid('service_id')->primary();
            $table->enum('service_type',['','conciergerie','ménage'])->default('');
            $table->string('service_name');
            $table->string('description')->nullable();
            $table->time('duration')->nullable();
            $table->timestamps();

            //Clé étrangère
            $table->uuid('agent_id')->nullable();
            $table->foreign('agent_id')->references('agent_id')->on('agents')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
