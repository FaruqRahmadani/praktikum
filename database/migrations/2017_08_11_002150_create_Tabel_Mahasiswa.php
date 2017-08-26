<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Tabel_Mahasiswa', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_user');
          $table->string('NPM', 25);
          $table->string('nama', 50);
          $table->string('no_hp', 12);
          $table->string('foto', 255);
          $table->string('email', 50);
          $table->string('tipe', 25)->default('1');
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
        Schema::dropIfExists('Tabel_Mahasiswa');
    }
}
