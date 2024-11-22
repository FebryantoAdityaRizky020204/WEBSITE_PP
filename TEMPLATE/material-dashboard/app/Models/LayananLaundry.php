<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananLaundry extends Model
{
    use HasFactory;

    protected $table = 'layanan_laundry';

    protected $fillable = [
        'id',
        'id_jenis_laundry',
        'nama_layanan',
        'harga_layanan',
        'satuan_barang'
    ];
}