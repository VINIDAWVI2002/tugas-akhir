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
        Schema::create('member', function (Blueprint $table) {
            $table->id('member_id');
            $table->text('member_nama')->nullable();
            $table->text('member_alamat')->nullable();
            $table->text('member_jenis_kelamin')->nullable();
            $table->date('member_tanggal_lahir')->nullable();
            $table->text('member_foto')->nullable();
            $table->text('email')->nullable();
            $table->text('member_notlp')->nullable();
            $table->text('password')->nullable();
            $table->text('remember_token')->nullable();
            $table->text('member_kode')->nullable();
            $table->integer('flag_erase')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member');
    }
};
