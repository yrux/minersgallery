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
            $table->integer('old_id_product')->default(0);
            $table->integer('category_id')->default(0);
            $table->integer('sort_order')->default(0);
            $table->integer('views')->default(0);
            $table->float('price')->default(0);
            $table->float('weight')->default(0);
            $table->float('shipping_freight')->default(0);
            $table->integer('in_stock')->default(0);
            $table->string('sku',255);
            $table->string('name',255);
            $table->string('slug',300);
            $table->text('brief_description');
            $table->text('description');
            $table->smallInteger('is_active')->default(1);
            $table->smallInteger('is_deleted')->default(0);
            $table->smallInteger('user_id')->default(0);
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
