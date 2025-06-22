<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kota';

    protected $fillable = [
        'nama_kota',
    ];

    public function wisata()
    {
        return $this->hasMany(Wisata::class, 'kota_id');
    }
}
