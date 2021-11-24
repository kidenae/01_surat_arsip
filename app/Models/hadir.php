<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hadir extends Model
{
    use HasFactory;

    protected $table = 'hadir';
    protected $fillable = [
        'HDRID',
        'SISNIS',
        'HDRTGL',
        'HDRJAM',
    ];
}
