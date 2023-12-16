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

        Schema::create('corridors', function (Blueprint $table) {
            $table->id();

            $table->text('more');

            $table->integer('time');
            $table->integer('views')->nullable();;

            $table->integer('rating')->nullable();;
            $table->string('photo')->nullable();
            $table->integer('size')->nullable();;

            $table->integer('downloads')->nullable();;
            $table->string('pack')->nullable();;

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
        Schema::dropIfExists('corridors');
    }
};
