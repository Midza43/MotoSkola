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
        Schema::create('kandidati', function (Blueprint $table) {
            $table->id();
            $table->string('imeprezime');
            $table->string('datumRodjenja');
            $table->string('kategorijaPolaganja');
            $table->string('instruktor.id');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kandidati');
    }
};
