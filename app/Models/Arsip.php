<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    protected $table = 'arsips';
    protected $dates = ['created_at'];
    protected $fillable = [
        'no_surat',
        'kategori',
        'judul',
        'created_at',
    ];
}
