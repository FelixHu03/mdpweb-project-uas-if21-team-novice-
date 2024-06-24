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
        Schema::create('layanan_tambahans', function (Blueprint $table) {
            $table->char('id_layanan', 5);
            $table->primary('id_layanan');
            $table-> string('nama_layanan', 20);
            $table->integer('harga_layanan_tambahan');
            $table->timestamps();
        });        
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_tambahans');
    }
};
