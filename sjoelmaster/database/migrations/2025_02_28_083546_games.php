<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); // Game Name
            $table->date('start_date'); // Start Date
            $table->foreignId('competition_id')->constrained('competities')->onDelete('cascade'); 
            $table->timestamps(); // Created_at and Updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
