<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\supplier;
use App\Models\unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produk.produk', [
            'products' => product::all(),
            'supplier' => supplier::all(),
            'unit' => unit::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.createProduct', [
            'supplier' => supplier::all(),
            'unit' => unit::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RespRequestonse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'productNumber' => 'required',
            'productName' => 'required',
            'unitId' => 'required',
            'basePrice' => 'required',
            'sellingPrice' => 'required',
            'stock' => 'required',
            'supplierId' => 'required',
        ]);
        product::create($validatedData);
        return redirect('/product')->with('succes', 'new product has been add');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        return view('produk.editProduct', [
            'supplier' => supplier::all(),
            'unit' => unit::all(),
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $rules = [
            'productNumber' => 'required',
            'productName' => 'required',
            'unitId' => 'required',
            'basePrice' => 'required',
            'sellingPrice' => 'required',
            'stock' => 'required',
            'supplierId' => 'required',
        ];

        $validatedData = $request->validate($rules);
        product::where('id', $product->id)->update($validatedData);
        return redirect('/product')->with('success', 'Product has been Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        product::destroy($product->id);
        return redirect('/product')->with('success', 'Product has been delete');
    }
}
