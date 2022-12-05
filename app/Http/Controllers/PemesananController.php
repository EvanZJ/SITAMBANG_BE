<?php

namespace App\Http\Controllers;
use App\Models\Stock;
use Inertia\Inertia;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::all();
        return Inertia::render('Pemesanan/Pemesanan', [
            'stocks' => $stocks,
            'token' => csrf_token(),
        ]);
    }

    public function pilih_pembayaran(Request $r){

        $stocks = Stock::all();
        $total_stock = count($stocks);

        // menyimpan data pembelian berupa id stock dan total beli
        $data_pembelian=[];
        $total_harga = 0;
        for($i = 1; $i <= $total_stock; $i++){
            $total_beli = $r['beli'.$i];
            if(!is_numeric($total_beli)){
                // berarti dia null (bukan number)
                continue;
            }
            // is numberic
            if($total_beli > 0){
                //  ada yang di beli
                $boughted_stock = $stocks->where('id', '=', $i)[$i-1]; // weird stuff, but it works
                
                $total_harga+= $boughted_stock['harga'] * $total_beli;

                $data_pembelian[$i]=[
                    'stock' => $boughted_stock,
                    'total_pembelian' => $total_beli
                ];
            }
        }
        if($total_harga==0){
            // oo dia submit tapi ga beli apa apa
            redirect('/pembeli/pemesanan');
        }
        $r->session()->put('data_pembelian', $data_pembelian);

        // render
        return Inertia::render('Pemesanan/PilihPembayaran', [
            'data_pembelian' => $data_pembelian,
            'total_harga' => $total_harga,
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
        //
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
