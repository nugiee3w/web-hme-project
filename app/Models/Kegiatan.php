<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';

    protected $fillable = [
        'nama_kegiatan',
        'deskripsi',
        'gambar',
        'kategori',
        'tanggal_kegiatan',
        'status'
    ];

    protected $casts = [
        'tanggal_kegiatan' => 'date',
    ];

    // Scope untuk kegiatan yang published
    public function scopePublished($query)
    {
        return $query->where('status', 'Published');
    }

    // Scope berdasarkan kategori
    public function scopeByKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }
}
