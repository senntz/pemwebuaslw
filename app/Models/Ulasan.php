<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $table = 'ulasan';

    protected $fillable = [
        'wisata_id',
        'user_id',
        'rating',
        'komentar',
    ];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'wisata_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
