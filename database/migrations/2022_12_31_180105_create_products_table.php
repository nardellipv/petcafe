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

            $table->string('name', 150);
            $table->string('description');
            $table->string('image')->nullable();
            $table->integer('buyPrice');
            $table->integer('sellPrice');
            $table->integer('discount')->nullable();
            $table->integer('quantity');
            $table->date('expire')->nullable();
            $table->enum('post', ['Si', 'No']);
            $table->string('slug', 150);
            $table->integer('provider_id');

            //relaciones
            $table->foreignId('internalCode')
                ->nullable()
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
