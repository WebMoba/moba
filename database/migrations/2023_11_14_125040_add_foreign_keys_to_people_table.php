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
        Schema::table('people', function (Blueprint $table) {
            $table->foreign(['number_phones_id'], 'fk_people_number_phones1')->references(['id'])->on('number_phones')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['team_works_id'], 'fk_people_team_works1')->references(['id'])->on('team_works')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['towns_id'], 'fk_people_towns1')->references(['id'])->on('towns')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['users_id'], 'fk_people_users1')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('people', function (Blueprint $table) {
            $table->dropForeign('fk_people_number_phones1');
            $table->dropForeign('fk_people_team_works1');
            $table->dropForeign('fk_people_towns1');
            $table->dropForeign('fk_people_users1');
        });
    }
};
