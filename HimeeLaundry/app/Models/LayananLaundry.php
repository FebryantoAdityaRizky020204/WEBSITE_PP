<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LayananLaundry extends Model
{
    use HasFactory;

    protected $table = 'layanan_laundry';

    protected $fillable = [
        'id',
        'id_jenis_laundry',
        'nama_layanan',
        'harga_layanan',
        'satuan_barang',
        'estimasi_pengerjaan',
        'satuan_waktu'
    ];

    public function jenisLaundry(): BelongsTo {
        return $this->belongsTo(JenisLaundry::class, 'id_jenis_laundry');
    }

    public function transaksiLayanan() : HasMany {
        return $this->hasMany(TransaksiLayanan::class, 'id_layanan');
    }
}