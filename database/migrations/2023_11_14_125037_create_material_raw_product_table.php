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
        Schema::create('material_raw_product', function (Blueprint $table) {
            $table->boolean('disable')->default(true);
            $table->integer('materials_raws_id')->index('fk_material_raw_product_materials_raws1_idx');
            $table->integer('products_id')->index('fk_material_raw_product_products1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_raw_product');
    }
};
