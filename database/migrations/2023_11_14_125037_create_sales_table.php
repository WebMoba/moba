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
        Schema::create('sales', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 55)->nullable();
            $table->date('date')->nullable();
            $table->boolean('disable')->default(false);
            $table->integer('total')->nullable();
            $table->timestamps();
            $table->integer('people_id')->index('fk_sales_people1_idx');
            $table->integer('quotes_id')->index('fk_sales_quotes1_idx')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
