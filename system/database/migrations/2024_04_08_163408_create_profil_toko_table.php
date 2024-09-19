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
        Schema::create('profil_toko', function (Blueprint $table) {
            $table->id('profil_toko_id');
            $table->text('nama_toko')->nullable();
            $table->text('alamat_toko')->nullable();
            $table->text('email_toko')->nullable();
            $table->text('maps')->nullable();
            $table->text('notlp_toko')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_toko');
    }
};
