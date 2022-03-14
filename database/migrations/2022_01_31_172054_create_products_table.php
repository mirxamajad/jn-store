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
            $table->increments('id');
            $table->string('name');
            $table->string('brandname');
            $table->string('status');
            $table->string('sku')->uniqid();
            $table->string('slug');
            $table->string('price');
            $table->string('discount')->nullable();
            $table->text('tags');
            $table->enum('bestsallers',['0','1']);
            $table->text('slugs');
            $table->text('summary');
            $table->text('description');
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
