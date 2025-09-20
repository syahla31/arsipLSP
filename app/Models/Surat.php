<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_surat',
        'kategori_id', // Ganti 'kategori' menjadi 'kategori_id'
        'judul',
        'file_path',
    ];

    // Tambahkan method relasi ini
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
