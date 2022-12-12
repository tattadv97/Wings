<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $fillable = [
        'customerNumber',
        'customerName',
        'address',
        'msisdn',
    ];

    use HasFactory;

    protected $guarded = ['id'];

    public function TransactionDetail()
    {
        return $this->hasMany(Transaction::class);
    }
}
