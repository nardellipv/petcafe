<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();

            $table->string('name', 150)->nullable();
            $table->string('address')->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('phone2', 50)->nullable();
            $table->mediumText('comment')->nullable();
            $table->string('email', 150)->nullable();

            //Relaciones

            $table->foreignId('shop_id')
                ->nullable()
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('providers');
    }
}
