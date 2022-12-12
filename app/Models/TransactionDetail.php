<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = [
        'invoice',
        'productId',
        'qty',
        'price',
        'profit',
        'subtotal',
];

    use HasFactory;

    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(product::class, 'productId');
    }

    public function transaction()
    {
        return $this->hasMany(transaction::class, 'invoice');
    }

}
