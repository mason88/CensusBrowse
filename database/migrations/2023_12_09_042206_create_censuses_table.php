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
        Schema::create('censuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('age')->nullable();
            $table->unsignedInteger('pop')->nullable();
            $table->unsignedSmallInteger('year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('censuses');
    }
};
