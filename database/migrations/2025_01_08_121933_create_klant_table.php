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
        Schema::create('klant', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('adres')->nullable();
            $table->string('residence')->nullable();
            $table->integer('phonenumber')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klant');
    }
};
