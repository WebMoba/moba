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
        Schema::create('materials_raws', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 55)->nullable();
            $table->integer('existing_quantity')->nullable();
            $table->timestamps();
            $table->integer('units_id')->index('fk_materials_raws_units1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materials_raws');
    }
};
