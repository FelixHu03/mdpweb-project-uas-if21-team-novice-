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
        Schema::create('kamars', function (Blueprint $table) {
            $table->char('id_kamar', 5);
            $table->primary('id_kamar');
            $table-> string('tipe_kamar');
            $table->integer('harga');
            $table->enum('Status', 
                array('Available', 'Booked', 'Occupied', 'Under Maintenance'));
            $table->string('url_foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamars');
    }
};
