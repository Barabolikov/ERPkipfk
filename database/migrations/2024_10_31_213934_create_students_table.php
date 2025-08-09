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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('group_id')->constrained()->onDelete('cascade');
            $table->string('pip');
            $table->string('email');
            $table->string('tel')->nullable();
            $table->string('telegram')->nullable();
            $table->string('pip_an')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('pas_ser')->nullable();
            $table->string('pas_nom')->nullable();
            $table->string('gender')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('ad_obl')->nullable();
            $table->string('ad_ray')->nullable();
            $table->string('ad_nas')->nullable();
            $table->string('pilga')->nullable();
            $table->string('pilga_ser')->nullable();
            $table->string('pilga_nom')->nullable();
            $table->string('gurt_room')->nullable();
            $table->date('pas_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
