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
        Schema::create('iuran_bulanans', function (Blueprint $table) {
            $table->id();
            $table->string('id_iuran_bulanan');
            $table->string('nik');
            $table->string('bulan_bayar');
            $table->date('tanggal_bayar');
            $table->integer('nominal');
            $table->boolean('status');
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
        Schema::dropIfExists('iuran_bulanans');
    }
};
