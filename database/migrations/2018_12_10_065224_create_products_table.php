<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->text('imagePath')->nullable();
            $table->text('colors')->nullable();
            $table->text('description');
            $table->unsignedInteger('price');
            $table->text('processor')->nullable();
            $table->text('ghz')->nullable();
            $table->text('graphics')->nullable();
            $table->text('memory')->nullable();
            $table->text('storage')->nullable();
            $table->text('display')->nullable();
            $table->text('ports')->nullable();
            $table->unsignedInteger('quantity');
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
        Schema::dropIfExists('products');
    }
}
