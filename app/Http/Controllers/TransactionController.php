<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\operational;
use App\Models\product;
use App\Models\transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function invoiceNumber()
    {
        $latest = transaction::latest()->first();

        if (! $latest) {
            return 'TRX0001';
        }

        $string = preg_replace("/[^0-9\.]/", '', $latest->invoice);
        return 'TRX' . sprintf('%04d', $string+1);
    }

    public function index()
    {
        return view('transaction.list', [
            'transactions' => transaction::all(),
            'customer' => customer::all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaction.transaction');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = transaction::create([
            'invoice' => $this->invoiceNumber()
        ]);

        return redirect()->route('transaction.edit', ['transaction' => $create->invoice]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(transaction $transaction)
    {
        $views['trx'] = $transaction;
        $views['customer'] = customer::find($transaction->customerId);
        $views['product'] = product::all();
        $views['trxDetail'] = TransactionDetail::with('product')->where('invoice', $transaction->invoice)->get();
        return view('transaction.cetakTransaction', $views);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(transaction $transaction)
    {
        $views['trx'] = $transaction;
        $views['customer'] = customer::all();
        $views['product'] = product::all();
        $views['trxDetail'] = TransactionDetail::with('product')->where('invoice', $transaction->invoice)->get();
        $views['subtotal'] = TransactionDetail::where('invoice', $transaction->invoice)->sum('subtotal');
        return view('transaction.transaction', $views);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transaction $transaction)
    {
        //ambil data request
        $data = $request->validate([
        'customerId' => 'required',
        'totalPrice' => 'required',
        'paymentMethode' => 'required',
        'paymentStatus' => 'required',
        ]);

        $op = $request->validate([
            'mutasi' => 'required',
            'type' => 'required',
            'nominal' => 'required',
            'keterangan' => 'required'
        ]);

        operational::create($op);
        //menyimpan data ke tabel transaksi
        transaction::where('invoice', $transaction->invoice)->update($data);
        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaction $transaction)
    {
        transaction::destroy($transaction->id);
        return redirect()->route('transaction.index');
    }

    public function cetak()
    {
        return view('transaction.cetakTransaction');
    }
}
