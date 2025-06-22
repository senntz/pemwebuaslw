<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $table = 'wisata';

    protected $fillable = [
        'nama_wisata',
        'deskripsi',
        'kategori_id',
        'kota_id',
        'biaya_masuk'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function kota()
    {
        return $this->belongsTo(Kota::class, 'kota_id');
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'wisata_id');
    }

    public function getRatingRataRata()
    {
        return $this->ulasan()->avg('rating') ?? 0;
    }

    public function getTotalUlasanAttribute()
    {
        return $this->ulasan()->count();
    }
}
