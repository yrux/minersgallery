<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYtablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ytables', function (Blueprint $table) {
            $table->id();
            $table->text('js_file');
            $table->string('page_heading',500)->nullable();
            $table->string('new_url',500)->nullable();
            $table->string('model_name',255)->nullable()->comment('laravel model name, Fill this when you have different model name and different table name');
            $table->string('table_name',255)->nullable()->comment('database table name');
            $table->enum('page_limit',[10, 25, 50, 100]);
            $table->smallInteger('is_deleted')->default(0);
            $table->smallInteger('fast_crud')->default(1);
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
        Schema::dropIfExists('ytables');
    }
}
