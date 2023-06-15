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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique()->nullable();
            $table->unsignedBigInteger('kelas_id')->constrained('kelas')->nullable();
            $table->string('nama_lengkap',50);
            $table->string('nis')->unique()->nullable();
            $table->string('nisn')->unique()->nullable();
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->tinyText('tempat_lahir',50)->nullable();
            $table->dateTime('tanggal_lahir')->nullable();
            $table->enum('agama', ['Islam', 'Hindu', 'Khatolik', 'Budha', 'Kristen', 'Lainya'])->nullable();
            $table->enum('status_siswa', ['Lulus', 'Aktif', 'Pindah', 'Keluar'])->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('nama_wali')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->string('telpon')->nullable();
            $table->tinyText('alamat', 50)->nullable();
            $table->text('avatar')->nullable();
            $table->timestamps();

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
