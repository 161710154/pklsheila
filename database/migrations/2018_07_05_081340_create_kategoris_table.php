<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategoris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('news');
            $table->string('populer');
            $table->string('fashion');
            $table->string('kpop');
            $table->string('infotainment');
            $table->string('food');
            $table->unsignedInteger('artikel_id');
            $table->foreign('artikel_id')->references('id')->on('artikels')->ondelete('cascade');
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
        Schema::dropIfExists('kategoris');
    }
}
