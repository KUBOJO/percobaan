<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    // Penyesuaian nama tabel eksplisit
    protected $table = 'mata_kuliahs';

    protected $fillable = [
        'kode',
        'nama',
        'semester',
        'sks_teori',
        'sks_praktikum',
        'deskripsi',
        'capaian_pembelajaran',
        'referensi',
        'jenis', // Wajib/Pilihan
        'prasyarat', // Kode matkul prasyarat
    ];

    // Akses total SKS
    public function getTotalSksAttribute()
    {
        return $this->sks_teori + $this->sks_praktikum;
    }

    // Relasi ke mata kuliah prasyarat
    public function prasyaratMatkul()
    {
        return $this->belongsTo(MataKuliah::class, 'prasyarat', 'kode');
    }
}
