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
Schema::create('academics_graduates_tittles', function (Blueprint $table) {
    $table->id();

    $table->foreignId('academic_tittle_id')->constrained('academic_tittles'); // ✅ solo una vez
    $table->foreignId('graduate_id')->constrained('graduates');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academics_graduates_tittles');
    }
};
