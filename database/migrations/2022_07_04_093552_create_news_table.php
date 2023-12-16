<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');

            $table->integer('views');
            $table->string('photo')->nullable();

            $table->json('pics')->nullable();

            $table->text('text');

            $table->text('more')->nullable();;
            $table->text('photo_more')->nullable();;

            $table->String('time')->nullable();;
            $table->integer('ces')->nullable();;

            $table->string('category');


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
        Schema::dropIfExists('news');
    }
};
