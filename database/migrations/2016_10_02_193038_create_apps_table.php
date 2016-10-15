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
            $table->string('title')->default("");
            $table->string('filename'); // Name
            $table->string('version')->default("");
            $table->text('introduction'); //

            $table->string('img')->default(""); // img ico , not screenshots
            // $table->integer('type'); // sub-table
            $table->string('size')->default("0K"); // unit Mbit
            $table->string('developer')->default(""); // develop sub-table
            $table->string('platform')->default(""); // platform
            $table->string('license')->default(""); // license
            // hidden screenshots , sub-table show
            // $table->integer('screenshots'); // screenshots sub-table
            // $table->integer('address'); // download address
            $table->integer('author')->default(0); // author id
            $table->integer('downloadNumber')->default(0); // 下载量
            $table->integer('visitNumber')->default(0); // 访问量
            $table->string('disk')->default(''); // 存在哪个磁盘系统中，local,s3,rackspace, or qiniu
            $table->string('originalName')->default(""); // 原来的名字
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
        Schema::dropIfExists('apps');
    }
}
