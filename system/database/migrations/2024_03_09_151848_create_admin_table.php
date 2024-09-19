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
        Schema::create('admin', function (Blueprint $table) {
            $table->id('admin_id');
            $table->text('nama')->nullable();
            $table->text('foto')->nullable();
            $table->text('notlp')->nullable();
            $table->text('sift')->nullable();
            $table->text('jobdesk')->nullable();
            $table->text('posisi')->nullable();
            $table->text('email')->nullable();
            $table->text('password')->nullable();
            $table->integer('level')->default(0);
            $table->integer('flag_erase')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
