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
        Schema::create('quotes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->date('date_issuance')->nullable();
            $table->text('description')->nullable();
            $table->integer('total')->nullable();
            $table->integer('discount')->nullable();
            $table->enum('status', ['aprobado', 'rechazado', 'pendiente'])->nullable();
            $table->boolean('disable')->default(true);
            $table->timestamps();
            $table->integer('people_id')->index('fk_quotes_people1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotes');
    }
};
