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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('more');
            $table->string('photo')->nullable();

            $table->integer('views')->nullable();;
            $table->integer('downloads')->nullable();;

            $table->json('inputs')->nullable();

            $table->unsignedBigInteger('sections_id');
            $table->foreign('sections_id')->references('id')->on('sections')->onDelete('cascade');


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
        Schema::dropIfExists('subjects');
    }
};
