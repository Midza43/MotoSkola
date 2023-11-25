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
        Schema::create('motori', function (Blueprint $table) {
            $table->id();
            $table->string('proizvodjac');
            $table->string('model');
            $table->string('tip');
            $table->string('kategorijaPolaganja');            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motori');
    }
};
