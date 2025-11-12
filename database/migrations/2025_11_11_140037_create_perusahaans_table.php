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
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usaha_id')->references('id')->on('usaha')->onDelete('cascade');
            $table->foreignId('industri_id')->references('id')->on('industri')->onDelete('cascade');
            $table->string('perusahaan')->nullable();
            $table->string('pemilik')->nullable();
            $table->text('jln');
            $table->string('desa');
            $table->string('kec');
            $table->string('telp')->nullable();
            $table->string('email')->nullable();
            $table->integer('nib')->nullable();
            $table->integer('npwp')->nullable();
            $table->integer('kbli')->nullable();
            $table->string('produk')->nullable();
            $table->enum('skala', ['kecil', 'menengah', 'besar']);
            $table->integer('jml_tk')->nullable();
            $table->string('sppirt')->nullable();
            $table->string('halal')->nullable();
            $table->string('merk')->nullable();
            $table->string('sni')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaans');
    }
};
