<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Imagetable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagetable', function (Blueprint $table) {
            $table->id();
            $table->string('table_name',50);
            $table->text('img_path');
            $table->integer('ref_id')->default(0);
            $table->integer('type')->default(0);
            $table->integer('is_active_img')->default(1);
            $table->text('additional_attributes');
            $table->text('img_href');
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
        Schema::dropIfExists('imagetable');
    }
}
