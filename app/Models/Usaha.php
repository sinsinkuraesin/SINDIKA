<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    use HasFactory;

    protected $table = 'usaha';
    protected $fillable = ['nama_usaha'];

    /** RELASI */
    public function ikms()
    {
        return $this->hasMany(Ikm::class, 'usaha_id');
    }
}
