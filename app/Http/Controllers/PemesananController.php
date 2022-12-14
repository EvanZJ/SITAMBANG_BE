<?php

namespace App\Http\Controllers;

use App\Models\berisi;
use App\Models\Pemesanan;
use App\Models\Stock;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        if($data_pembelian){
            foreach($data_pembelian as $data){
                $total_beli_stock[$data['stock']->id] = $data['total_pembelian'];
            }
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
            return redirect(route('pemesanan.index'))
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
        $total_harga = session('total_harga');
        if($total_harga){
            return Inertia::render('Pemesanan/PilihPembayaran', [
                'data_pembelian' => session('data_pembelian'),
                'total_harga' => session('total_harga'),
                'metode_pembayaran' => session('caraPembelian'),
                'msg' => session('msg'),
                'token' => csrf_token(),
            ]);
        }
        return redirect(route('pemesanan.index'))->with('msg', 'Anda belum melakukan pemesanan');

    }

    public function proses_pilih_pembayaran(Request $r){
        $caraPembayaran = $r['caraPembayaran'];
        
        if($caraPembayaran){
            $r->session()->put('caraPembelian', $caraPembayaran);
            $r->session()->forget('msg');
            return redirect(route('pemesanan.konfirmasi_pemesanan'));
        }
        // belum milih metode pembayaran
        $r->session()->put('msg', 'Anda belum memilih metode pembayaran');
        return redirect(route('pemesanan.pilih_pembayaran'));
    }

    public function konfirmasi_pemesanan(){
        // dd(session('caraPembelian'));
        return Inertia::render('Pemesanan/KonfirmasiPemesanan', [
            'data_pembelian' => session('data_pembelian'),
            'total_harga' => session('total_harga'),
            'metode_pembayaran' => session('caraPembelian'),
            'token' => csrf_token(),
        ]);
    }

    public function info_pembayaran_tunai(){
        // dd(session('caraPembelian'));
        return Inertia::render('Pemesanan/InfoPembayaranTunai', [
            'data_pembelian' => session('data_pembelian'),
            'total_harga' => session('total_harga'),
            'metode_pembayaran' => session('caraPembelian'),
            'token' => csrf_token(),
        ]);
    }
    public function info_pembayaran_bank(){
        // dd(session('caraPembelian'));
        return Inertia::render('Pemesanan/InfoPembayaranBank', [
            'total_harga' => session('total_harga'),
            'metode_pembayaran' => session('caraPembelian'),
            'token' => csrf_token(),
        ]);
    }
    public function info_pembayaran_ewallet(){
        // dd(session('caraPembelian'));
        return Inertia::render('Pemesanan/InfoPembayaranEWallet', [
            'total_harga' => session('total_harga'),
            'metode_pembayaran' => session('caraPembelian'),
            'token' => csrf_token(),
        ]);
    }

    public function unggah_bukti_pembayaran(){
        $metode_pembayaran = session('caraPembelian');
        if($metode_pembayaran){
            // oo ada
            // dd(1);
            return Inertia::render('Pemesanan/UploadBuktiPembayaran', [
                'token' => csrf_token() ,
                'msg' => session('msg'),
            ]);
        }
        // belum pesen
        return redirect(route('pemesanan.index'))->with('msg', 'Anda belum melakukan pemesanan');
    }

    public function store_pemesanan(Request $r){
        $input = [];
        // dd($r);
        // dd($r->file('bukti-pembayaran'));
        if(!$r->hasFile('bukti-pembayaran')){
            return redirect(route('pemesanan.unggah_bukti_pembayaran'))->with('msg', 'Anda belum mengunggah foto');
        }

        $r->session()->forget('msg');
        $bukti = $r->file('bukti-pembayaran');
        if(filesize($bukti) > 100000){
            return redirect(route('pemesanan.unggah_bukti_pembayaran'))->with('msg', 'Ukuran bukti melebihi 100Kb, harap dikompress');
        }
        $offset_to_gmt = date('Z');
        $datetime = date('Y-m-d_H-i-s', time()-$offset_to_gmt+7*3600);// YYYY-mm-dd-HH-ii-ss  but gmt+7
        
        $fileName =  $datetime. '.' . $bukti->getClientOriginalExtension();
        // save bukti (berhasil)
        Storage::disk('local')->put('images/pemesanan/'.$fileName, $bukti, 'public');
        
        // save data pemesanan
        // $input['totalPembayaran'] = session('total_harga');
        // $input['caraPembayaran'] = session('caraPembelian');
        // $input['user_id'] = Auth::id();
        // $input['karyawan_id'] = 1;// default value, nanti diedit sama verifier
        // $input['status'] = 'unverified';
        // $input['bukti_path'] = 'images/pemesanan/'.$fileName;
        // $input['verified_at'] = null;

        $pemesanan = Pemesanan::create([
            'user_id' => Auth::id(),
            'karyawan_id' => 1, // default
            'totalPembayaran' => session('total_harga'),
            'caraPembayaran' => session('caraPembelian'),
            'status' => 'unverified',
            'verified_at' => null,
            'bukti_path' => 'images/pemesanan/'.$fileName
        ]);
        // Pemesanan::create($input);

        foreach(session('data_pembelian') as $data){
            berisi::create([
                'pemesanan_id' => $pemesanan->id,
                'stock_id' => $data['stock']->id,
                'kuantitas' => $data['total_pembelian']
            ]);
            // here hilangkan stock ()
            $the_stock = Stock::findOrFail($data['stock']->id);
            $the_stock->total_persediaan -=$data['total_pembelian'];
            $the_stock->save();
        }


        return $this->selesai_memesan();

    }

    public function selesai_memesan(){
        session()->forget('data_pembelian');
        session()->forget('total_harga');
        session()->forget('msg');
        session()->forget('caraPembelian');
    
        return redirect(route('pembeli.dashboard'));
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

    public function verifikasi(){
        if (Auth::guard('karyawan')->check()) {
            return Inertia::render('VerifikasiPemesananView', [
                'csrf' => csrf_token(),
                'token' => csrf_token(),
            ]);
        }
        else{
            return redirect()->route('login');
        }
    }

    public function verifikasiPagination(){
        if (Auth::guard('karyawan')->check()) {
            $riwayatTransaksi = Pemesanan::where('status', 'unverified')->paginate(10);
            //dd($riwayatTransaksi);
            return $riwayatTransaksi;
        }
        else{
            return redirect()->route('login');
        }
    }

    public function detailVerifikasi(Request $request){
        if (Auth::guard('karyawan')->check()) {
            $data = Pemesanan::where('id', $request->id)->get();
            $product = $data[0]->Berisi()->get();
            $list_product = [];
            foreach ($product as $p){
                $list_product[] = $p->Stock()->get()[0];
            }
            $nama = $data[0]->User()->get()[0];
            return Inertia::render('DetailVerifikasiView', [
                'data' => $data,
                'product' => $product,
                'list_product' => $list_product,
                'nama' => $nama,
                'csrf' => csrf_token(),
            ]);
        }
        else{
            return redirect()->route('login');
        }

    }

    public function verify(Request $request, $id){
        if (Auth::guard('karyawan')->check()) {
            $data = Pemesanan::findOrFail($id);
            $offset_to_gmt = date('Z');
            $datetime = date('Y-m-d_H-i-s', time()-$offset_to_gmt+7*3600);// YYYY-mm-dd-HH-ii-ss  but gmt+7
            $data->status = 'verified';
            $data->verified_at = $datetime;
            $data->save();
            return redirect()->route('verifikasi.index');
        }
        else{
            return redirect()->route('login');
        }

    }
}
