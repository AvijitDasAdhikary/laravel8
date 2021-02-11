<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms_sections', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->integer('id')->autoIncrement();
            $table->integer('form_id');
            $table->string('section_title')->nullable();
            $table->integer('parent_id')->length(2)->nullable();
            $table->tinyinteger('is_active')->comment('0 => Inactive, 1=> Active')->length(2);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('form_id')->references('id')->on('forms');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms_sections');
    }
}
