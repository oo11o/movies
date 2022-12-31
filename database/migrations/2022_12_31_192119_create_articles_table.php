<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('menu_id');
            $table->string('title');
            $table->string('description');
            $table->string('url')->unique();
            $table->string('h1');
            $table->string('image')->nullable();
            $table->text('intro')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
            $table->foreign('menu_id')
                ->references('id')
                ->on('menus')
                ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
