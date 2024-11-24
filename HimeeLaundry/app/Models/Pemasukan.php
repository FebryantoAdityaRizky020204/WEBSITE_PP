<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pemasukan extends Model
{
    use HasFactory;
    protected $table = 'pemasukan';

    protected $fillable = [
        'id',
        'pemasukan',
        'status_pembayaran'
    ];

    public function transaksi() : HasOne {
        return $this->hasOne(Transaksi::class, 'id_pemasukan');
    }
}