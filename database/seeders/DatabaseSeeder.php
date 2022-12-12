<?php

namespace Database\Seeders;

use App\Models\customer;
use App\Models\product;
use App\Models\supplier;
use App\Models\unit;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        supplier::create([
            'supplierNumber' => 'SP001',
            'companyName' => 'Indofood',
            'address' => 'Bekasi',
            'salesName' => 'Rian',
            'phoneNumber' => '0219987',
            'msisdnSales' => '08219987'
        ]);
        supplier::create([
            'supplierNumber' => 'SP002',
            'companyName' => 'Unilever',
            'address' => 'Bekasi',
            'salesName' => 'Agus',
            'phoneNumber' => '0219987',
            'msisdnSales' => '08567986'
        ]);

        customer::create([
            'customerNumber' => 'CS001',
            'customerName' => 'umum',
            'address' => 'null',
            'msisdn' => '0',
        ]);

        product::create([
            'productNumber' => 'PR001',
            'productName' => 'Kopi ABC',
            'unitId' => '1',
            'basePrice' => '10000',
            'sellingPrice' => '12000',
            'stock' => '10',
            'supplierId' => '1'
        ]);
        product::create([
            'productNumber' => 'PR002',
            'productName' => 'Indomie',
            'unitId' => '4',
            'basePrice' => '90000',
            'sellingPrice' => '100000',
            'stock' => '15',
            'supplierId' => '1'
        ]);
        product::create([
            'productNumber' => 'PR003',
            'productName' => 'Indomilk',
            'unitId' => '2',
            'basePrice' => '7000',
            'sellingPrice' => '8000',
            'stock' => '20',
            'supplierId' => '1'
        ]);

        unit::create([
            'name' => 'PCS'
        ]);
        unit::create([
            'name' => 'Renceng'
        ]);
        unit::create([
            'name' => 'PAK'
        ]);
        unit::create([
            'name' => 'Kardus'
        ]);

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'role' => 'Admin',
        ]);
        User::create([
            'name' => 'User',
            'username' => 'user',
            'password' => bcrypt('user'),
            'role' => 'User',
        ]);
    }
}
