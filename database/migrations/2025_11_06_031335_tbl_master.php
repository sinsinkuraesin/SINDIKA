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
        Schema::create('tbl_master', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tgl');
            $table->string('bdn_usaha');
            $table->string('perusahaan');
            $table->string('nm_pemilik');
            $table->string('jln');
            $table->string('desa');
            $table->string('kec');
            $table->integer('no_tlp');
            $table->string('email');
            $table->integer('nib');
            $table->integer('npwp');
            $table->integer('kbli');
            $table->string('jns_produk');
            $table->string('skala');
            $table->string('label_industri');
            $table->integer('jml_tk');
            $table->string('sppirt');
            $table->string('halal');
            $table->string('merk');
            $table->string('sni');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tbl_master');
    }
};
