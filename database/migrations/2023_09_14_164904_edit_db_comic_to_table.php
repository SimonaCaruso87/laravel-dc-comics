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
        Schema::table('comics', function (Blueprint $table) {
            $table->text('title', 255)->change();
            $table->text('description', 150)->change(); // Cambia la lunghezza massima a 65535 (massimo per un campo di tipo TEXT in MySQL)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comics', function (Blueprint $table) {
            $table->text('title')->change();
            $table->text('description')->change(); // Cambia la lunghezza massima a 65535 (massimo per un campo di tipo TEXT in MySQL)

        });
    }
};
