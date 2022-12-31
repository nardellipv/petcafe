<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();

            $table->integer('invoice');
            $table->integer('quantity');
            $table->date('date');
            $table->enum('status',['Pagada','Cuenta Corriente', 'Cancelada']);
            $table->integer('mount');
            $table->integer('discount')->nullable();
            $table->mediumText('comment')->nullable();

            //relaciones

            $table->foreignId('customer_id')
                ->constrained()
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
        Schema::dropIfExists('sales');
    }
}
