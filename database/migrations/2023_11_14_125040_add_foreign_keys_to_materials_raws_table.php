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
        Schema::table('materials_raws', function (Blueprint $table) {
            $table->foreign(['units_id'], 'fk_materials_raws_units1')->references(['id'])->on('units')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('materials_raws', function (Blueprint $table) {
            $table->dropForeign('fk_materials_raws_units1');
        });
    }
};
