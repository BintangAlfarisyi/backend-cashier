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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('nip');
            $table->integer('nik');
            $table->string('nama');
            $table->enum('jenis_kelamin', ['pria', 'wanita']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('telpon');
            $table->string('agama');
            $table->enum('status_nikah', ['nikah', 'belum nikah']);
            $table->string('alamat');
            $table->integer('golongan_id');
            $table->string('foto');
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
        Schema::dropIfExists('employees');
    }
};
