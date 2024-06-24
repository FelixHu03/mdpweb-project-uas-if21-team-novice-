<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->char('id_hotel',7);
            $table->primary('id_hotel');
            $table->foreignId('name_id')->constrained(
                table: 'users',
                indexName:'hotel_name_id'
            );
            $table->string('nama_hotel');
            $table->string('alamat_hotel');
            $table->integer('Level_bintang');
            $table->string('fasilitas_hotel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
