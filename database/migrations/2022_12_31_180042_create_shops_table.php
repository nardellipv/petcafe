<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();

            $table->string('name', 150)->nullable();
            $table->string('address', 150)->nullable();
            $table->string('phone', 30)->nullable();
            $table->enum('phoneWsp', ['Y', 'N'])->nullable();
            $table->mediumText('about')->nullable();
            $table->integer('votes')->default(0);
            $table->integer('visit')->default(0);
            $table->string('web', 100)->nullable();
            $table->string('facebook', 100)->nullable();
            $table->string('instagram', 100)->nullable();
            $table->string('logo', 150)->nullable();
            $table->enum('type', ['FREE', 'BASIC', 'CLASIC', 'PREMIUM'])->default('FREE');
            $table->string('slug', 150)->unique()->nullable();
            $table->enum('status', ['ACTIVE', 'DESACTIVE'])->default('ACTIVE');

            //relaciones

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('city_id')
                ->nullable()
                ->constrained()
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
        Schema::dropIfExists('shops');
    }
}
