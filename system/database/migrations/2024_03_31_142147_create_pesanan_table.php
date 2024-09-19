<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('pesanan_id');
            $table->text('pesanan_member_id')->nullable();
            $table->text('pesanan_nama_penerima')->nullable();
            $table->text('pesanan_kode')->nullable();
            $table->text('pesanan_total_harga')->nullable();
            $table->text('pesanan_meja_nomor')->nullable();
            $table->text('pesanan_nama')->nullable();
            $table->text('pesanan_alamat')->nullable();
            $table->text('pesanan_notlp')->nullable();
            $table->text('pesanan_pembayaran_id')->nullable();
            $table->text('pesanan_bukti')->nullable();
            $table->text('pesanan_status')->default(0);  
            // 0 baru, 1 ditolak , 2 diterima,3 diantar, 4 selesai
            $table->text('pesanan_tanggal')->nullable();
            $table->text('pesanan_bulan')->nullable();
            $table->text('pesanan_tahun')->nullable();
            $table->text('pesanan_pesan')->nullable();
            $table->integer('flag_erase')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
