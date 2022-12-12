<?php

namespace App\Http\Controllers;

use App\Models\operational;
use Illuminate\Http\Request;

class OperationalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $views['uangMasuk'] = operational::where('mutasi', '=', 'Pemasukan')->sum('nominal');
        $views['uangKeluar'] = operational::where('mutasi', '=', 'Pengeluaran')->sum('nominal');
        $views['operational'] = operational::all();
        return view('operational.operational',$views);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operational.addOperational');
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
            'type' => 'required',
            'mutasi' => 'required',
            'nominal' => 'required',
            'keterangan' => 'required',
        ]);

        operational::create($data);
        return redirect()->route('operational.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\operational  $operational
     * @return \Illuminate\Http\Response
     */
    public function show(operational $operational)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\operational  $operational
     * @return \Illuminate\Http\Response
     */
    public function edit(operational $operational)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\operational  $operational
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, operational $operational)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\operational  $operational
     * @return \Illuminate\Http\Response
     */
    public function destroy(operational $operational)
    {
        operational::destroy($operational->id);
        return redirect()->route('operational.index');
    }
}
