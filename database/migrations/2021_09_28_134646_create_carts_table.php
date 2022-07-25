<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('desain_id');
            $table->unsignedInteger('transaksi_id');
            $table->integer('user_id');
            $table->integer('jendela')->default('1');
            $table->integer('pintu')->default('1');
            $table->string('kamar_mandi')->default('luar');
            $table->integer('harga')->nullable();
            $table->integer('total')->nullable();
            $table->string('permintaan')->nullable();
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
        Schema::dropIfExists('carts');
    }
}
