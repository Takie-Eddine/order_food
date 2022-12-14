<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expence_details', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('expence_id')->constrained('expences')->cascadeOnDelete();
            $table->enum('type',['cash_in','cash_out']);
            $table->float('price');
            $table->text('description')->nullable();
            $table->float('old')->default(0.00);
            $table->float('total')->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expence_details');
    }
};
