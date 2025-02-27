<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class competitie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competities', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name column (string)
            $table->date('start_date'); // Start date column (date)
            $table->date('finish_date'); // Finish date column (date)
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competities');
    }
}
