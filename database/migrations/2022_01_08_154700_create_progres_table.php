<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progres', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('desain_id')->nullable();
            $table->unsignedInteger('cart_id')->nullable();
            $table->string('progres_1')->nullable();
            $table->string('progres_2')->nullable();
            $table->string('progres_3')->nullable();
            $table->string('komentar_1')->nullable();
            $table->string('komentar_2')->nullable();
            $table->string('komentar_3')->nullable();
            $table->string('final_desain')->nullable();
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
        Schema::dropIfExists('progres');
    }
}
