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
        Schema::create('people', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_card')->unique('id_card_UNIQUE');
            $table->string('addres', 55)->nullable();
            $table->enum('identification_type', ['cedula', 'cedula Extranjeria', 'NIT']);
            $table->string('name', 100)->nullable();
            $table->enum('rol',['Administrador', 'Cliente', 'Proveedor']);
            $table->timestamps();
            $table->string('region_id')->nullable();
            $table->boolean('disable')->default(false);
            $table->integer('team_works_id')->index('fk_people_team_works1_idx');
            $table->integer('number_phones_id')->index('fk_people_number_phones1_idx');
            $table->integer('towns_id')->index('fk_people_towns1_idx');
            $table->unsignedBigInteger('users_id')->index('fk_people_users1_idx');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
};
