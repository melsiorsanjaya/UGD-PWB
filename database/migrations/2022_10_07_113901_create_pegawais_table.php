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
            $table->Integer('id_departemen');
            $table->boolean('gender')->default;
            $table->boolean('status')->default;
            $table->Integer('telepon');
            
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