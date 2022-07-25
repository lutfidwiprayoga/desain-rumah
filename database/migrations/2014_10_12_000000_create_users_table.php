<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('no_hp')->default('-');
            $table->string('alamat')->default('-');
            $table->string('nik')->default('-');
            $table->string('jenis_kelamin')->default('-');
            $table->string('no_rekening')->default('-');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('level');
            $table->string('foto')->default('-');
            $table->string('profile')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
