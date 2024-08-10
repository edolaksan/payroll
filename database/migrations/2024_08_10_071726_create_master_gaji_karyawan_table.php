<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('master_gaji_karyawan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')->constrained('master_pegawai')->onDelete('cascade');
            $table->decimal('gaji_pokok', 10, 2);
            $table->decimal('denda_keterlambatan', 10, 2)->nullable();
            $table->string('bulan'); // tambahkan kolom 'bulan'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_gaji_karyawan');
    }
};
