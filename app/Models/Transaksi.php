<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['kasir_id'];

    // Relasi ke model Kasir
    public function kasir()
    {
        return $this->belongsTo(Kasir::class);
    }

    // Relasi ke model DetailTransaksi
    public function details()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
