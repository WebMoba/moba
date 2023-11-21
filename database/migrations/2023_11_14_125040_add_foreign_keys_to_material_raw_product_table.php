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
        Schema::table('material_raw_product', function (Blueprint $table) {
            $table->foreign(['materials_raws_id'], 'fk_material_raw_product_materials_raws1')->references(['id'])->on('materials_raws')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['products_id'], 'fk_material_raw_product_products1')->references(['id'])->on('products')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('material_raw_product', function (Blueprint $table) {
            $table->dropForeign('fk_material_raw_product_materials_raws1');
            $table->dropForeign('fk_material_raw_product_products1');
        });
    }
};
