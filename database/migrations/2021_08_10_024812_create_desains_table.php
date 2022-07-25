<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desains', function (Blueprint $table) {
            $table->id();
            $table->integer('kategori_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('nama', 25);
            // $table->string('kategori');
            $table->string('tipe', 5);
            $table->integer('harga');
            $table->string('foto_desain')->default('-');
            $table->string('tampak_samping_kiri')->default('-');
            $table->string('tampak_samping_kanan')->default('-');
            $table->string('keterangan', 255);
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
        Schema::dropIfExists('desains');
    }
}
