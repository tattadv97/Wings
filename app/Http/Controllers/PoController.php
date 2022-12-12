<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\operational;
use App\Models\po;
use App\Models\poDetails;
use App\Models\product;
use App\Models\supplier;
use Illuminate\Http\Request;

class PoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function purchaseNumber()
    {
        $latest = po::latest()->first();

        if (! $latest) {
            return 'PO0001';
        }

        $string = preg_replace("/[^0-9\.]/", '', $latest->purchaseNo);
        return 'PO' . sprintf('%04d', $string+1);
    }

    public function index()
    {
        return view('po.list', [
            'po' => po::all(),
            'supplier' => supplier::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('po.po');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = po::create([
            'purchaseNo' => $this->purchaseNumber()
        ]);

        return redirect()->route('po.edit', ['po' => $create->purchaseNo]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\po  $po
     * @return \Illuminate\Http\Response
     */
    public function show(po $po)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\po  $po
     * @return \Illuminate\Http\Response
     */
    public function edit(po $po)
    {
        $views['po'] = $po;
        $views['supplier'] = supplier::all();
        $views['product'] = product::all();
        $views['poDetails'] = poDetails::with('product')->where('purchaseNo', $po->purchaseNo)->get();
        $views['subtotal'] = poDetails::where('purchaseNo', $po->purchaseNo)->sum('subtotal');

        return view('po.po', $views);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\po  $po
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, po $po)
    {
        //ambil data request
        $data = $request->validate([
            'supplierId' => 'required',
            'totalPrice' => 'required',
        ]);

        $op = $request->validate([
            'mutasi' => 'required',
            'type' => 'required',
            'nominal' => 'required',
            'keterangan' => 'required'
        ]);

        operational::create($op);
        //menyimpan data ke tabel transaksi
        po::where('purchaseNo', $po->purchaseNo)->update($data);
        return redirect()->route('po.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\po  $po
     * @return \Illuminate\Http\Response
     */
    public function destroy(po $po)
    {
        po::destroy($po->id);
        return redirect()->route('po.index');
    }
}
