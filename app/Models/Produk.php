<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Menambahkan kolom 'gambar' ke dalam $fillable
    protected $fillable = [
        'nama_produk',
        'harga',
        'kategori',
        'gambar', // Menambahkan kolom gambar agar bisa di-mass assign
    ];

    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
