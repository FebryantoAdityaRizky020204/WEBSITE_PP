<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLaundry extends Model
{
    use HasFactory;
    protected $table = 'jenis_laundry';

    protected $fillable = [
        'id',
        'jenis_laundry',
    ];
}