<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->integer('id')->autoIncrement();
            $table->string('name')->nullable()->unique();
            $table->string('alias')->nullable();
            $table->string('description')->nullable();
            $table->tinyInteger('is_active')->comment('0 > Inactive, 1 > Active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
