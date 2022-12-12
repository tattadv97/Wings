<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class po extends Model
{
    protected $fillable = [
        'purchaseNo',
        'supplierId',
        'totalPrice',
    ];

    use HasFactory;

    protected $guarded = ['id'];

    public function supplier()
    {
        return $this->belongsTo(supplier::class, 'supplierId');
    }

    public function poDetails()
    {
        return $this->belongsTo(poDetails::class, 'purchaseNo');
    }
}
