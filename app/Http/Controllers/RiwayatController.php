<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riwayats = Riwayat::all();
        return view('riwayats.index', compact('riwayats', 'riwayats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('riwayats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'pemesanan_id' => 'required',
            'date' => 'required',
            'total' => 'required',
            'bukti_path' => 'required',
        ]);

        $input = $request->all();

        Riwayat::create($input);

        return redirect()->route('riwayats.index')
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $riwayat = Riwayat::findOrFail($id);

        return view('riwayats.show', compact('riwayat', 'riwayat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $riwayat = Riwayat::find($id);
        return view('riwayats.edit', compact('riwayat', 'riwayat'));
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
        $riwayat = Riwayat::findOrFail($id);

        $this->validate($request, [
            'pemesanan_id' => 'required',
            'date' => 'required',
            'total' => 'required',
            'bukti_path' => 'required',
        ]);

        $input = $request->all();

        $riwayat->fill($input)->save();

        return redirect()->route('riwayats.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riwayat = Riwayat::findOrFail($id);

        $riwayat->delete();
        
        return redirect()->route('riwayats.index');
    }
}
