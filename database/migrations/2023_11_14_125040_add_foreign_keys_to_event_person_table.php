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
        Schema::table('event_person', function (Blueprint $table) {
            $table->foreign(['events_id'], 'fk_event_person_events1')->references(['id'])->on('events')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['people_id'], 'fk_event_person_people1')->references(['id'])->on('people')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_person', function (Blueprint $table) {
            $table->dropForeign('fk_event_person_events1');
            $table->dropForeign('fk_event_person_people1');
        });
    }
};
