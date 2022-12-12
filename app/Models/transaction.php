<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $fillable = [
        'invoice',
        'customerId',
        'totalPrice',
        'paymentMethode',
        'paymentStatus',
];

    use HasFactory;

    protected $guarded = ['id'];

    public function customer()
    {
        return $this->belongsTo(customer::class, 'customerId');
    }

    public function transactionDetail()
    {
        return $this->belongsTo(TransactionDetail::class, 'invoice');
    }
}
