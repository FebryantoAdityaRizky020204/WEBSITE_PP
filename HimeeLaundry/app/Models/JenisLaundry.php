<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisLaundry extends Model
{
    use HasFactory;
    protected $table = 'jenis_laundry';

    protected $fillable = [
        'id',
        'jenis_laundry',
    ];

    public function layananLaundry(): HasMany {
        return $this->hasMany(LayananLaundry::class, 'id_jenis_laundry');
    }
}