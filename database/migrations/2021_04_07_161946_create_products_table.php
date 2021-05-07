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
            $table->unsignedBigInteger('user_id')->nullable(); // $table->unsignedBigInteger('user_id')->nullable();
            $table->string('product_name');
            $table->text('product_desc');
            $table->text('product_price');
            $table->text('product_img')->nullable();
            $table->string('product_brand')->nullable();
            $table->timestamps();

            $table->foreign('user_id')   // juhul kui kustutad useri andmebaasist siis kustub ka article veerud mis viitavad antud userile
            ->references('id')
                ->on('users')
                ->onDelete('cascade');
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
