<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    protected $fillable = [
        'nama_kategori',
    ];

    public function wisata()
    {
        return $this->hasMany(Wisata::class, 'kategori_id');
    }
}
