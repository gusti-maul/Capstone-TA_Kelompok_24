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
        Schema::create('mapel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tapel_id')->nullable();
            $table->unsignedBigInteger('guru_id')->nullable();
            $table->string('kode_mapel')->unique();
            $table->string('mapel');
            $table->string('deskripsi');
            $table->timestamps();

            $table->foreign('tapel_id')->references('id')->on('tapel')->onDelete('cascade');
            $table->foreign('guru_id')->references('id')->on('guru')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapel');
    }
};
