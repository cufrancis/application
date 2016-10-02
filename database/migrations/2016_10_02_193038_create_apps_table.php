<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); // Name
            $table->string('version');
            $table->text('introduction'); //

            $table->string('img'); // img ico , not screenshots
            $table->integer('type'); // sub-table
            $table->string('size'); // unit Mbit
            $table->string('developer'); // develop sub-table
            $table->integer('platform'); // platform
            $table->integer('license'); // license
            // hidden screenshots , sub-table show
            // $table->integer('screenshots'); // screenshots sub-table
            // $table->integer('address'); // download address
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apps');
    }
}
