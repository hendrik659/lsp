<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoPengaduan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_pengaduan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('foto_id');
            $table->foreign('tipe_id')->references('id')->on('tipe_kamar');
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
        Schema::dropIfExists('foto_pengaduan');
    }
}
