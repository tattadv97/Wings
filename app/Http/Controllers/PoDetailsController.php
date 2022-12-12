<?php

namespace App\Http\Controllers;

use App\Models\poDetails;
use App\Models\product;
use Illuminate\Http\Request;

class PoDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'purchaseNo' => 'required',
            'product' => 'required',
            'qty' => 'required',
        ]);
        //ambil data produk
        $product = product::find($data['product']);
        //hitung stock yang masuk
        $data['productId'] = $product->id;
        $data['price'] = $product->basePrice;
        $data['subtotal'] = $product->basePrice * $data['qty'];
        //hitung stock baru
        $stock = $product->stock + $data['qty'];
        //update data stock di table product
        $product->update([
            'stock' => $stock
        ]);
        $product->save();

        // save transaction detail
        poDetails::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\poDetails  $poDetails
     * @return \Illuminate\Http\Response
     */
    public function show(poDetails $poDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\poDetails  $poDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(poDetails $poDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\poDetails  $poDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, poDetails $poDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\poDetails  $poDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy($poDetails)
    {
        $find = poDetails::find($poDetails);
        //ambil data product
        $product = product::find($find['productId']);
        //perhitungan stock
        $stock = $product->stock - $find['qty'];
        //Update data stock product
        $product->update([
            'stock' => $stock
        ]);
        $product->save();
        //hapus data
        poDetails::destroy($find->id);
        return redirect()->back();
    }
}
