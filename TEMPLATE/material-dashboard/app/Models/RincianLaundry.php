<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RincianLaundry extends Model
{
    use HasFactory;

    protected $table = 'rincian_laundry';

    protected $fillable = [
        'id',
        'id_transaksi',
        'nama_barang',
        'jumlah_barang',
    ];

    public function transaksi(): BelongsTo {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }
}