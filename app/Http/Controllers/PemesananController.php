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

        $total_beli_stock = [];
        $data_pembelian = session('data_pembelian');
        foreach($data_pembelian as $data){
            $total_beli_stock[$data['stock']->id] = $data['total_pembelian'];
        }
        return Inertia::render('Pemesanan/Pemesanan', [
            'stocks' => $stocks,
            'token' => csrf_token(),
            'total_beli_stock' => $total_beli_stock,
            'msg' => session('msg'),
            
        ]);
    }

    public function proses_pemesanan(Request $r){

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
            $r->session()->put('msg', 'Keranjang anda kosong');
            // oo dia submit tapi ga beli apa apa
            return redirect(route('pembeli.index'))
            // ->with(['msg' => 'Keranjang anda kosong'])
            ;
        }
        else{
            $r->session()->put('data_pembelian', $data_pembelian);
            $r->session()->put('total_harga',$total_harga);
            $r->session()->forget('msg');
            return redirect(route('pemesanan.pilih_pembayaran'))
            // ->with([
            //     'data_pembelian' => $data_pembelian,
            //     'total_harga' => $total_harga
            // ])
            ;
        }

    }

    public function pilih_pembayaran(){
        return Inertia::render('Pemesanan/PilihPembayaran', [
            'data_pembelian' => session('data_pembelian'),
            'total_harga' => session('total_harga'),
            'token' => csrf_token(),
        ]);
    }

    public function proses_pilih_pembayaran(Request $r){
        $r->session()->put('caraPembelian', $r['caraPembayaran']);
        // dd($r['caraPembayaran']);
        // dd($r->session());
        return redirect(route('pemesanan.konfirmasi_pemesanan'));
        // dd($r);

    }

    public function konfirmasi_pemesanan(){
        // dd(session('caraPembelian'));
        return Inertia::render('Pemesanan/KonfirmasiPemesanan', [
            'data_pembelian' => session('data_pembelian'),
            'total_harga' => session('total_harga'),
            'metode_pembayaran' => session('caraPembelian'),
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
