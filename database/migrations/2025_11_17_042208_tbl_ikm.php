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
    Schema::create('ikm', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usaha_id')->references('id')->on('usaha')->onDelete('cascade');
            $table->foreignId('industri_id')->references('id')->on('industri')->onDelete('cascade');
            $table->date('tgl_input')->nullable();
            $table->string('nm_perusahaan_')->nullable();
            $table->string('nm_pemilik')->nullable();
            $table->string('alamatpr');
            $table->string('alamatpm');
            $table->string('telp')->nullable();
            $table->string('email')->nullable();
            $table->integer('nib')->nullable();
            $table->text('dnib')->nullable();
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

    public function down(): void
    {
        Schema::dropIfExists('ikm');
    }
};
