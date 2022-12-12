<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $fillable = [
        'supplierNumber',
        'companyName',
        'address',
        'salesName',
        'phoneNumber',
        'msisdnSales',
];

    use HasFactory;

    protected $guarded = ['id'];

    public function product()
    {
        return $this->hasMany(product::class);
    }
    public function po()
    {
        return $this->hasMany(po::class);
    }
}
