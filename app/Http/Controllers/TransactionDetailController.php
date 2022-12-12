<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
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

        // ambil data form dari request
        $data = $request->validate([
            'invoice' => 'required',
            'product' => 'required',
            'qty' => 'required',
        ]);

        // ambil informasi product berdasarkan form name product
        $product = product::find($data['product']);
        // kali harga product * quantity = subtotal
        $data['productId'] = $product->id;
        $data['price'] = $product->sellingPrice;
        $data['subtotal'] = $product->sellingPrice * $data['qty'];
        $data['submodal'] = $product->basePrice * $data['qty'];
        $data['profit'] = $data['subtotal'] - $data['submodal'];
        //cek stock produk
        $stock = $product->stock - $data['qty'];
        if($stock < 0) {
            return redirect()->back()->with('message_error', 'stock kurang');
        }  else {

            $product->update([
                'stock' => $stock
            ]);
            $product->save();

            // save transaction detail
            TransactionDetail::create($data);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionDetail $transactionDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionDetail $transactionDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransactionDetail $transactionDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionDetail $transactionDetail)
    {
        //ambil data product
        $product = product::find($transactionDetail['productId']);
        //perhitungan stock
        $stock = $product->stock + $transactionDetail['qty'];
        //Update data stock product
        $product->update([
            'stock' => $stock
        ]);
        $product->save();
        //hapus data
        TransactionDetail::destroy($transactionDetail->id);
        return redirect()->back();
    }
}
