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
        Schema::create('keranjang', function (Blueprint $table) {
            $table->id('keranjang_id');
            $table->text('keranjang_menu_id')->nullable();
            $table->text('keranjang_member_id')->nullable();
            $table->integer('keranjang_qty')->default(1);
            $table->integer('keranjang_status')->default(1);
            $table->integer('flag_erase')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang');
    }
};
