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
        Schema::create('detail_purchases', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('quantity')->nullable();
            $table->integer('price_unit')->nullable();
            $table->integer('subtotal')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('total')->nullable();
            $table->timestamps();
            $table->integer('materials_raws_id')->index('fk_detail_purchases_materials_raws1_idx');
            $table->integer('purchases_id')->index('fk_detail_purchases_purchases1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_purchases');
    }
};
