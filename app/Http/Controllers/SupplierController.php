<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('supplier.supplier', [
            'suppliers' => supplier::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.createSupplier');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'supplierNumber' => 'required',
            'companyName' => 'required',
            'address' => 'required',
            'salesName' => 'required',
            'phoneNumber' => 'required',
            'msisdnSales' => 'required',
        ]);

        supplier::create($validatedData);
        return redirect('/supplier')->with('succes', 'new supplier has been add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(supplier $supplier)
    {
        return view('supplier.editSupplier', [
            'supplier' => $supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, supplier $supplier)
    {
        $rules = [
            'supplierNumber' => 'required',
            'companyName' => 'required',
            'address' => 'required',
            'salesName' => 'required',
            'phoneNumber' => 'required',
            'msisdnSales' => 'required',
        ];

        $validatedData = $request->validate($rules);
        supplier::where('id', $supplier->id)->update($validatedData);
        return redirect('/supplier')->with('success', 'supplier has been Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(supplier $supplier)
    {
        supplier::destroy($supplier->id);
        return redirect('/supplier')->with('success', 'supplier has been delete');
    }
}
