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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_induk_pegawai');
            $table->string('nama_pegawai');
            $table->integer('id_departemen');
            $table->string('email');
            $table->boolean('gender')->default;
            $table->boolean('status')->default;
            $table->integer('telepon');
            
            $table->timestamps();

            $table->foreign('departemen')->refences('nama_departemen')->on('departemens');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
};
