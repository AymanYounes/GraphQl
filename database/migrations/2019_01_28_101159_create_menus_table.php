<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('hash')->nullable()->unique();
            $table->string('is_clickable')->default(0);
            $table->string('link')->nullable();
            $table->unsignedInteger('parent_menu_id')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
        Schema::table('menus', function (Blueprint $table) {
            $table->foreign('parent_menu_id')->references('id')->on('menus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->dropForeign('menus_parent_menu_id_foreign');
        });
        Schema::dropIfExists('menus');
    }
}
