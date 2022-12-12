<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unit extends Model
{
    protected $fillable = [
        'name',
];

    use HasFactory;

    protected $guarded = ['id'];

    public function unit()
    {
        return $this->hasMany(unit::class);
    }
}
