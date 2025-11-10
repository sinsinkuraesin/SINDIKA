<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;
    protected $table = 'tbl_master';
    protected $fillable = [
        'tgl',
        'bdn_usaha',
        'perusahaan',
        'nm_pemilik',
        'jln',
        'desa',
        'kec',
        'no_tlp',
        'email',
        'nib',
        'npwp',
        'kbli',
        'jns_produk',
        'skala',
        'label_industri',
        'jml_tk',
        'spprit',
        'halal',
        'merk',
        'sni',
    ];
}
