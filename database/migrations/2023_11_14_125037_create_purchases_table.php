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
        Schema::create('purchases', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 55)->nullable();
            $table->date('date')->nullable();
            $table->boolean('disable')->default(false);
            $table->integer('total')->nullable();
            $table->timestamps();
            $table->integer('people_id')->index('fk_purchases_people1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
};
