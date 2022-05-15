<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id('id');
            $table->string('product_name');
            $table->double('product_price');
            $table->string('product_img');
            $table->string('product_description');
            $table->integer('product_feature');
            $table->integer('product_sale_amount');
            $table->integer('stock');
            $table->integer('sale_amount');
            $table->date('expire_date');
            $table->integer('discound_id');
            $table->integer('manufacture_id');
            $table->integer('type_id');
            $table->integer('review_id');
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
        Schema::dropIfExists('product');
    }
}
