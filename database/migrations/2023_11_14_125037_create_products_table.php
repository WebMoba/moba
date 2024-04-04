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
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 55)->nullable();
            $table->binary('image')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('price')->nullable();
            $table->boolean('disable')->default(true);
            $table->timestamps();
            $table->integer('units_id')->index('fk_products_units1_idx');
            $table->integer('categories_products_services_id')->index('fk_products_categories_products_services1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
