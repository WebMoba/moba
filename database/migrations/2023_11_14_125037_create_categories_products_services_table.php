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
        Schema::create('categories_products_services', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 55)->nullable();
            $table->string('description', 60)->nullable();
            $table->enum('status', ['active', 'inactive'])->nullable();
            $table->integer('quantity')->nullable();
            $table->enum('popular', ['Alta', 'Media', 'Baja'])->nullable();
            $table->enum('type', ['servicio', 'producto'])->nullable();
            $table->boolean('disable')->default(false);
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
        Schema::dropIfExists('categories_products_services');
    }
};
