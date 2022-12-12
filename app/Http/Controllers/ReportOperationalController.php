<?php

namespace App\Http\Controllers;

use App\Models\operational;
use Illuminate\Http\Request;

class ReportOperationalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('report.reportOperational', [
            'operational' => operational::all(),
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
            'type' => 'required',
        ]);
        $awal = $data['tglAwal'];
        $akhir = $data['tglAkhir'];
        $type = $data['type'];

        if($type == 'all'){
            $opr ['opr'] = operational::whereBetween('created_at', [$awal, $akhir])->get();
        }else{
            $opr ['opr'] = operational::whereBetween('created_at', [$awal, $akhir])
            ->where('type', $type)
            ->get();
            $opr ['nominal'] = operational::whereBetween('created_at', [$awal, $akhir])
            ->where('type', $type)
            ->sum('nominal');
        }

        return view('report.reportOperational', $opr);
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
}
