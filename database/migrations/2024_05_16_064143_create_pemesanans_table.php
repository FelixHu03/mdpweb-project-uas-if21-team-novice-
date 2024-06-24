<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->char('id_pemesanan', 15)->primary();
            $table->char('id_tamu', 5);
            $table->foreign('id_tamu')->references('id_tamu')->on('tamus')->onDelete('cascade');
            $table->char('id_kamar', 5);
            $table->foreign('id_kamar')->references('id_kamar')->on('kamars')->onDelete('cascade');
            $table->date('tgl_check_in');
            $table->date('tgl_check_out');
            $table->bigInteger('total_biaya');
            $table->enum('status_bayar', ['Paid', 'Unpaid']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
