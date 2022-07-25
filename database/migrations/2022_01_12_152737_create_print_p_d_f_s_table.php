<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrintPDFSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('print_p_d_f_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('cart_id');
            $table->unsignedInteger('progres_id');
            $table->unsignedInteger('desain_id');
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
        Schema::dropIfExists('print_p_d_f_s');
    }
}
