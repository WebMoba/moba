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
        Schema::table('detail_purchases', function (Blueprint $table) {
            $table->foreign(['materials_raws_id'], 'fk_detail_purchases_materials_raws1')->references(['id'])->on('materials_raws')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['purchases_id'], 'fk_detail_purchases_purchases1')->references(['id'])->on('purchases')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_purchases', function (Blueprint $table) {
            $table->dropForeign('fk_detail_purchases_materials_raws1');
            $table->dropForeign('fk_detail_purchases_purchases1');
        });
    }
};
