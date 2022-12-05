<?php

namespace App\Http\Controllers;

use App\Models\AlatTambak;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AlatTambakController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alats = AlatTambak::all();
        $karyawans = array();
        foreach ($alats as $alat){
            array_push($karyawans, $alat->Karyawan()->get()[0]);
        }
        return Inertia::render('KondisiAlatView', [
            'alats' => $alats,
            'karyawans' => $karyawans,
            'csrf' => csrf_token(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('TambahAlatView', [
            'csrf' => csrf_token(),
            'karyawans' => Karyawan::all(),
        ]);
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
            'name' => 'required',
            'karyawan_id' => 'required',
            'kondisi' => 'required',
        ]);

        $input = $request->all();

        AlatTambak::create($input);

        return redirect()->route('alat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alat = AlatTambak::findOrFail($id);
        return view('alats.show', compact('alat', 'alat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alat = AlatTambak::findOrFail($id);
        $pj = $alat->Karyawan()->get()[0];
        return Inertia::render('UpdateAlatView', [
            'alat' => $alat,
            'csrf' => csrf_token(),
            'karyawans' => Karyawan::all(),
            'pj' => $pj,
        ]);
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
        $alat = AlatTambak::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'karyawan_id' => 'required',
            'kondisi' => 'required',
        ]);

        $input = $request->all();

        $alat->fill($input)->save();

        return redirect()->route('alat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alat = AlatTambak::findOrFail($id);

        $alat->delete();
        
        return redirect()->route('alat.index');
    }
}
