<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class operational extends Model
{
    protected $fillable = [
        'mutasi',
        'type',
        'nominal',
        'keterangan',
    ];

    use HasFactory;
}
