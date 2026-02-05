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
        Schema::create('etudiants_class', function (Blueprint $table) {
    $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
    $table->foreignId('class_id')->constrained('class')->onDelete('cascade');
    $table->primary(['user_id', 'class_id']);
}); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
