<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table = 'perusahaan';
    protected $fillable = [
        'usaha_id',
        'industri_id',
        'perusahaan',
        'pemilik',
        'jln',
        'desa',
        'kec',
        'telp',
        'email',
        'nib',
        'npwp',
        'kbli',
        'produk',
        'skala',
        'jml_tk',
        'sppirt',
        'halal',
        'merk',
        'sni',
    ];
}
