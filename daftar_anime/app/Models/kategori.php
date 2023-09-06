<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'genre_id',
        'total',
        'tanggal'
    ];

    public function genre() {
        return $this->belongsTo(genre::class, 'genre_id');
        }
}
