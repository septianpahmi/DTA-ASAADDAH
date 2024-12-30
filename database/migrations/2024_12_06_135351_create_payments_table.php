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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('no_ref');
            $table->string('nominal');
            $table->date('tanggal_tagihan')->nullable();
            $table->date('tanggal_pembayaran')->nullable();
            $table->enum('status', ['Menunggu Pembayaran', 'Berhasil', 'Gagal'])->default('Menunggu Pembayaran');
            $table->unsignedBigInteger('id_siswa');
            $table->timestamps();

            $table->foreign('id_siswa')->references('id')->on('siswas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
