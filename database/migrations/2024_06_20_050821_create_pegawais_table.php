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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id('id');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->string('alamat');
            $table->date('tanggal_lahir');
            $table->string('no_telepon', 20)->unique();
            $table->unsignedBigInteger('jenis_kelamin');
            $table->foreign('jenis_kelamin')
            ->references('id')
            ->on('jenis_kelamins');
            $table->unsignedBigInteger('kota_id');
            $table->foreign('kota_id')
                ->references('id')
                ->on('kotas');
            $table->char('id_layanan', 5);                
            $table->foreign('id_layanan')
                ->references('id_layanan')
                ->on('layanan_tambahans');
            $table->string('url_foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
