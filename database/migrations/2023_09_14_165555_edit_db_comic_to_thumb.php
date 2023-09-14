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
            $table->string('thumb' ,1024)->nullable()->change();
            $table->string('type' , 100)->nullable()->change();
            $table->string('artists' , 255)->nullable()->change();
            $table->string('writers' , 255)->nullable()->change();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comics', function (Blueprint $table) {
            $table->string('thumb');
            $table->string('type')->nullable();
            $table->string('artists')->nullable();
            $table->string('writers')->nullable();
        });
    }
};
