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
        Schema::create('projects', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 50)->nullable();
            $table->string('description', 600)->nullable();
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->binary('logo');
            $table->binary('imageOne')->nullable();
            $table->binary('imageTwo')->nullable();
            $table->binary('imageThree')->nullable();
            $table->boolean('disable')->default(false);
            $table->enum('status', ['en curso', 'finalizado', 'pausado', 'pendiente'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
