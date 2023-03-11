<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('description');
            $table->string('provider');
            $table->string('internalCode')->unique()->nullable();
            $table->string('image')->nullable();
            $table->integer('buyPrice');
            $table->integer('sellPrice');
            $table->integer('discount')->nullable();
            $table->integer('quantity');
            $table->date('expire')->nullable();
            $table->enum('post', ['Si', 'No']);
            $table->string('slug');

            //relaciones

            $table->foreignId('shop_id')
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
        Schema::dropIfExists('products');
    }
}
