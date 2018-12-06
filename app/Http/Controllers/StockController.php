<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Category;
use App\Item;
use App\User;
use DB;
use Auth;
use Illuminate\Http\Request;

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
        return view('items.lista', compact('stocks'));
    }

    public function tableshow()
    {
        $categories = Category::all();
        $items = Stock::all();

        return view('items.search', compact('items', 'categories'));
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
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = Stock::find($id);  
        return view('items.edit', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $this->validate(request(), [
          'cantidad' => 'required',
          'ideal' => 'required',
        ]);

        $stock = Stock::find($id);
        $stock->stock = $request->get('cantidad');
        $stock->cantidad_ideal = $request->get('ideal');
        $stock->id_house = Auth::user()->casa;
        $stock->usuario_modifica = Auth::user()->id;
        $stock->save();

        return redirect()->route('search');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
