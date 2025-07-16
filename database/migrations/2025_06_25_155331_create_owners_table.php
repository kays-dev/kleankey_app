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
        Schema::create('owners', function (Blueprint $table) {
            $table->uuid('owner_id')->primary();
            $table->string('owner_name');
            $table->string('owner_surname');
            $table->string('owner_mail');
            $table->string('owner_tel');
            $table->string('owner_address');
            $table->timestamps();

            // Clé étrangère
            $table->unsignedInteger('user_id')->nullable()->unique();
            $table->foreign('user_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
