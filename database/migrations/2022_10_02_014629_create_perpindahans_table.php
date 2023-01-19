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
        Schema::create('perpindahans', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat_pindah');
            $table->string('nik');
            $table->date('tanggal_pindah');
            $table->string('alamat_tujuan_pindah');
            $table->string('keterangan');
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
        Schema::dropIfExists('perpindahans');
    }
};
