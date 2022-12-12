<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\product;
use App\Models\transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class ReportTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('report.reportTransaksi', [
            TransactionDetail::all(),
            'product' => product::all()
        ]);
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
            'tglAwal' => 'required',
            'tglAkhir' => 'required',
            'product' => 'required',
        ]);
        $awal = $data['tglAwal'];
        $akhir = $data['tglAkhir'];
        $product = $data['product'];
        if ($product == 'all'){
            $trx ['trx']= TransactionDetail::whereBetween('created_at',[$awal, $akhir])->get();
            $trx ['profit']= TransactionDetail::whereBetween('created_at',[$awal, $akhir])->sum('profit');
            $trx ['turnover']= TransactionDetail::whereBetween('created_at',[$awal, $akhir])->sum('price');
        }else{
            $trx ['trx']= TransactionDetail::whereBetween('created_at',[$awal, $akhir])
            ->where('productId', $product)
            ->get();
            $trx ['total']= TransactionDetail::whereBetween('created_at',[$awal, $akhir])
            ->where('productId', $product)
            ->sum('qty');
        }

        return view('report.reportTransaksi', $trx);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function date($tglAwal, $tglAkhir)
    {

    }
}
