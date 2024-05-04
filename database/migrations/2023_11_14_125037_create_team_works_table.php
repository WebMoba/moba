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
        Schema::create('team_works', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('specialty', 65)->nullable();
            $table->text('assigned_work')->nullable();
            $table->date('assigned_date')->nullable();
            $table->boolean('disable')->default(false);
            $table->timestamps();
            $table->integer('projects_id')->index('fk_team_works_projects1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_works');
    }
};
