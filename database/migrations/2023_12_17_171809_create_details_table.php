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
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->string('adderess')->nullable();
            $table->string('main_email')->nullable();
            $table->string('alternative_email')->nullable();
            $table->string('main_phone')->nullable();
            $table->string('alternative_phone')->nullable();
            $table->string('facebook')->nullable();
            $table->string('tweeter')->nullable();
            $table->string('linkedIn')->nullable();
            $table->string('google_plus')->nullable();
            $table->string('short_details')->nullable();
            $table->string('about_details')->nullable();
            $table->string('google_map')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
