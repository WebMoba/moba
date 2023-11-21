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
        Schema::table('sales', function (Blueprint $table) {
            $table->foreign(['people_id'], 'fk_sales_people1')->references(['id'])->on('people')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['quotes_id'], 'fk_sales_quotes1')->references(['id'])->on('quotes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropForeign('fk_sales_people1');
            $table->dropForeign('fk_sales_quotes1');
        });
    }
};
