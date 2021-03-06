<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_permohonan');
            $table->foreignId('user_id');
            $table->string('judul_permohonan');
            $table->date('tanggal_permohonan');
            $table->enum('jenis_permohonan', ['tunai', 'transfer']);
            $table->foreignId('bank_id');
            $table->enum('status_berkas', ['pending', 'approved', 'rejected'])->default('pending');
            $table->enum('status_rilis', ['pending', 'rilis'])->default('pending');
            $table->date('tanggal_rilis')->nullable();
            $table->integer('jumlah_permohonan');
            $table->string('note')->nullable();
            $table->enum('prioritas', ['prioritas', 'tidak_prioritas'])->nullable();
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
        Schema::dropIfExists('permohonans');
    }
}
