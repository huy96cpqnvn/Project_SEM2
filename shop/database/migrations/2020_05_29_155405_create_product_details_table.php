<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            
            $table->String('name');
            $table->integer('product_id');
            $table->String('cover');
            $table->String('review');
            $table->text('detail');
            $table->float('price');
            $table->boolean('status');
            $table->integer('amount');
            $table->integer('author_id');
            $table->integer('language_id');
            $table->integer('priceFilter_id');
            $table->integer('publisher_id');
            $table->integer('user_id');
            $table->integer('discount_id');
            $table->softDeletes();
            
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
        Schema::dropIfExists('product_details');
    }
}
