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
        Schema::table('team_works', function (Blueprint $table) {
            $table->foreign(['projects_id'], 'fk_team_works_projects1')->references(['id'])->on('projects')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('team_works', function (Blueprint $table) {
            $table->dropForeign('fk_team_works_projects1');
        });
    }
};
