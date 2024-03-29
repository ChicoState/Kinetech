<?php
/*
 * @author Jordan Laney <jlaney4@mail.csuchico.edu>
 *
 * Migration file to define the products table for the database.
 */
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
            $table->string('sku', 8);
            $table->primary('sku');
            $table->string('description', 150);
            $table->string('img', 150);
            $table->string('brand', 30);
            $table->string('model', 30);
            $table->string('color', 30);
            $table->decimal('price',5,2);
            $table->integer('stock');
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
