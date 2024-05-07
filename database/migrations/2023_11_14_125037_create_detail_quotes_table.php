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
        Schema::create('detail_quotes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->boolean('disable')->default(false);
            $table->timestamps();
            $table->integer('services_id')->index('fk_detail_quotes_services1_idx')->nullable();
            $table->integer('products_id')->index('fk_detail_quotes_products1_idx')->nullable();
            $table->integer('projects_id')->index('fk_detail_quotes_projects1_idx')->nullable();
            $table->integer('quotes_id')->index('fk_detail_quotes_quotes1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_quotes');
    }
};
