<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'harga_beli',
        'harga_jual',
        'harga_grosir',
        'stok',
        'keterangan',
        'status',
    ];
}
