<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'productNumber',
        'productName',
        'unitId',
        'basePrice',
        'sellingPrice',
        'stock',
        'supplierId',
    ];

    public function supplier()
    {
        return $this->belongsTo(supplier::class, 'supplierId');
    }

    public function unit()
    {
        return $this->belongsTo(unit::class, 'unitId');
    }

    public function TransactionDetail()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function poDetails()
    {
        return $this->hasMany(poDetails::class);
    }
}
