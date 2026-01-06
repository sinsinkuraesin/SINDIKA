<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ikm extends Model
{
    use HasFactory;

    protected $table = 'ikm';

    protected $fillable = [
        'usaha_id',
        'industri_id',
        'tgl_input',
        'nm_perusahaan_',
        'nm_pemilik',
        'alamatpr',
        'alamatpm',
        'telp',
        'email',
        'nib',
        'dnib',
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

    /** RELASI */
    public function usaha()
    {
        return $this->belongsTo(Usaha::class, 'usaha_id');
    }

    public function industri()
    {
        return $this->belongsTo(Industri::class, 'industri_id');
    }
}
