<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'no_order',
        'nama_kasir'
    ];

    public function transaksiDetail()
    {
        return $this->hasMany(TransaksiDetail::class, 'id_order');
    }
}
