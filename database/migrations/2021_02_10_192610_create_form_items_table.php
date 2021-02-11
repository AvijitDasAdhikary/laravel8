<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_items', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->integer('id')->autoIncrement();
            $table->integer('section_id');
            $table->text('title')->nullable();
            $table->integer('points')->nullable();
            $table->tinyinteger('is_comment')->default(1)->nullable();
            $table->tinyinteger('is_picture_1')->default(1)->nullable();
            $table->tinyinteger('is_picture_2')->nullable();
            $table->tinyinteger('is_active')->comment('0 => Inactive, 1=> Active');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('section_id')->references('id')->on('form_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_items');
    }
}
