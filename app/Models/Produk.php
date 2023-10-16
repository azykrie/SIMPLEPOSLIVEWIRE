<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = [
        'id_kategori',
        'nama_produk',
        'stock',
        'harga'
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function transaksi(){
        return $this->hasMany(Transaksi::class, 'id_produk');
    }
}
