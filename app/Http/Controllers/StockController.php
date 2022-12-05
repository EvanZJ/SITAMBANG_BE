<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Stock;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StockController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::all();
        if (Auth::guard('web')->check()) {
            return Inertia::render('Stock', [
                'stocks' => $stocks,
                'isPembeli' => true,
                'isKaryawan' => false,
                'csrf' => csrf_token(),
            ]);
        }
        else if (Auth::guard('karyawan')->check()) {
            return Inertia::render('Stock', [
                'stocks' => $stocks,
                'isPembeli' => false,
                'isKaryawan' => true,
                'csrf' => csrf_token(),
            ]);
        }
        else{
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('TambahProdukView', [
            'csrf' => csrf_token(),
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
            'description' => 'required',
            'harga' => 'required',
            'total_persediaan' => 'required',
        ]);

        $input = $request->all();

        Stock::create($input);

        return redirect()->route('stock.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stock = Stock::findOrFail($id);
        return view('stocks.show', compact('stock', 'stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = Stock::findOrFail($id);
        return Inertia::render('EditStock', [
            'stock' => $stock,
            'csrf' => csrf_token(),
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
        $stock = Stock::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'harga' => 'required',
            'total_persediaan' => 'required',
        ]);

        $input = $request->all();

        $stock->fill($input)->save();

        return redirect()->route('stock.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = Stock::findOrFail($id);

        $stock->delete();
        
        return redirect()->route('stock.index');
    }
}
