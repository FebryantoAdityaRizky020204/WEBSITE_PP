<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';

    protected $fillable = [
        'id',
        'nama_pelanggan',
        'nomor_telepon'
    ];

    public function transaksi() : HasMany {
        return $this->hasMany(Transaksi::class, 'id_pelanggan');
    }
}