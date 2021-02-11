<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormItemCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_item_codes', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->integer('id')->autoIncrement();
            $table->integer('item_id');
            $table->integer('code_id');
            $table->tinyInteger('is_active')->comment('0 => Inactive, 1 => Active');
            $table->foreign('item_id')->references('id')->on('form_items');
            $table->foreign('code_id')->references('id')->on('form_codes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_item_codes');
    }
}
