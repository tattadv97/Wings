<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class poDetails extends Model
{
    protected $fillable = [
        'purchaseNo',
        'productId',
        'qty',
        'price',
        'subtotal',
    ];

    use HasFactory;

    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(product::class, 'productId');
    }

    public function po()
    {
        return $this->hasMany(po::class, 'purchaseNo');
    }
}
