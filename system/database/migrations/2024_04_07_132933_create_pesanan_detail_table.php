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
        Schema::create('pesanan_detail', function (Blueprint $table) {
            $table->id('pesanan_detail_id');
            $table->text('pesanan_id')->nullable();
            $table->text('pesanan_menu_id')->nullable();
            $table->text('kasir_id')->nullable();
            $table->text('pesanan_member_id')->nullable();
            $table->text('pesanan_menu_kategori_id')->nullable();
            $table->text('pesanan_menu_harga')->nullable();
            $table->text('pesanan_tanggal')->nullable();
            $table->text('pesanan_bulan')->nullable();
            $table->text('pesanan_tahun')->nullable();
            $table->integer('pesanan_menu_qty')->nullable();
            $table->integer('pesanan_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_detail');
    }
};
