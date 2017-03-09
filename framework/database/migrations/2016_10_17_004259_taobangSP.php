<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaobangSP extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('route',100);
            $table->integer('id_type')->unsigned();
            $table->foreign("id_type")->references("id")
                                      ->on("type_product");
            $table->text('description');
            $table->float("unit_price");
            $table->float('promotion_price');
            $table->string('promotion',100);
            $table->string('image');
            $table->string("unit");
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
        //
    }
}
