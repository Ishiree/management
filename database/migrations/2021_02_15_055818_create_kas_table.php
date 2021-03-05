<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_referensi_saldo');
            $table->date('tanggal');
            $table->enum('jenis', ['debet', 'kredit']);
            $table->bigInteger('jumlah');
            $table->bigInteger('saldo_akhir');
            $table->string('keterangan')->nullable();
            $table->foreignId('divisi_id');
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
        Schema::dropIfExists('kas');
    }
}
