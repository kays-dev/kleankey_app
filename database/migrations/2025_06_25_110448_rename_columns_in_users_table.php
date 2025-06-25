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
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('email','mail_user');
            $table->renameColumn('name','name_user');
            $table->renameColumn('password','pwd_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('mail_user','email');
            $table->renameColumn('name_user','name');
            $table->renameColumn('pwd_user','password');
        });
    }
};
