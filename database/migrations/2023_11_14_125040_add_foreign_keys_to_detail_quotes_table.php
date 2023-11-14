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
        Schema::table('detail_quotes', function (Blueprint $table) {
            $table->foreign(['products_id'], 'fk_detail_quotes_products1')->references(['id'])->on('products')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['projects_id'], 'fk_detail_quotes_projects1')->references(['id'])->on('projects')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['quotes_id'], 'fk_detail_quotes_quotes1')->references(['id'])->on('quotes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['services_id'], 'fk_detail_quotes_services1')->references(['id'])->on('services')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_quotes', function (Blueprint $table) {
            $table->dropForeign('fk_detail_quotes_products1');
            $table->dropForeign('fk_detail_quotes_projects1');
            $table->dropForeign('fk_detail_quotes_quotes1');
            $table->dropForeign('fk_detail_quotes_services1');
        });
    }
};
