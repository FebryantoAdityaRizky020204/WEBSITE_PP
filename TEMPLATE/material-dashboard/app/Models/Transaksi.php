<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'id',
        'id_transaksi',
        'id_pelanggan',
        'id_pemasukan',
        'status_laundry',
    ];

    public function transaksiLayanan(): HasMany {
        return $this->hasMany(TransaksiLayanan::class, 'id_transaksi');
    }

    public function rincianLaundry(): HasMany {
        return $this->hasMany(RincianLaundry::class, 'id_transaksi');
    }

    public function pemasukan(): BelongsTo {
        return $this->belongsTo(Pemasukan::class, 'id_pemasukan');
    }

    public function pelanggan(): BelongsTo {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
}