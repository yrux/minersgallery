<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('company',255)->nullable();
            $table->string('address',500);
            $table->string('city',100);
            $table->string('zip',20);
            $table->string('country',100);
            $table->string('phone',20);
            $table->string('email',255);
            $table->text('notes')->nullable();
            $table->decimal('order_total',8,2)->default(0.00);
            $table->decimal('discount',8,2)->nullable()->default(0.00);
            $table->decimal('order_rowtotal',8,2)->default(0.00);
            $table->decimal('order_products',8,2)->default(0);
            $table->integer('order_status')->default(0);
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
        Schema::dropIfExists('order');
    }
}
