<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TransaksiLayanan extends Model
{
    use HasFactory;

    protected $table = 'transaksi_layanan';

    protected $fillable = [
        'id',
        'id_layanan',
        'id_transaksi',
        'nilai_barang',
    ];

    public function transaksi(): BelongsTo {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }

    public function layanan(): BelongsTo {
        return $this->belongsTo(LayananLaundry::class, 'id_layanan');
    }
}