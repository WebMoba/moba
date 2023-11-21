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
        Schema::table('products', function (Blueprint $table) {
            $table->foreign(['categories_products_services_id'], 'fk_products_categories_products_services1')->references(['id'])->on('categories_products_services')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['units_id'], 'fk_products_units1')->references(['id'])->on('units')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('fk_products_categories_products_services1');
            $table->dropForeign('fk_products_units1');
        });
    }
};
