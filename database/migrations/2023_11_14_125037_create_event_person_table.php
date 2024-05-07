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
        Schema::create('event_person', function (Blueprint $table) {
            $table->boolean('disable')->default(false);
            $table->integer('people_id')->index('fk_event_person_people1_idx');
            $table->integer('events_id')->index('fk_event_person_events1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_person');
    }
};
