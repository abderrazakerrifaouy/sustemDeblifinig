<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // fuxide error the class name to avoid conflict with reserved word "class"
    public function up(): void
    {
        Schema::create('etudiants_class', function (Blueprint $table) {
    $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
    $table->foreignId('class_id')->references('id')->on('classes')->onDelete('cascade');
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
