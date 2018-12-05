<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Category;
use App\Item;
use DB;
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
       /* $twest = DB::table('stocks')->where('stock','=', 'cantidad_ideal')->get()->pluck('id_item')->toArray();
              
dd($twest); */     
        /*$items = DB::table('items')
                    ->join('stocks', function ($join) {
                        $join->on('items.id', '=', 'stocks.id_item')
                             ->whereRaw('stocks.stock = stocks.cantidad_ideal');
                    })
                    ->get();*/

/*dd($items);*/
        //$items = Offering::where('cantidad_ideal', '<', 'stock')->get()->pluck('nombre')
        //$stock = DB::table('stocks')->where('stock', '<', 'cantidad_ideal')->get()->pluck('nombre')->toArray();
        /*$stockes = DB::table('items')
                    ->join('stocks', function ($join) {
                        $join->on('items.id', '=', 'stocks.id_item')
                             ->whereRaw('stocks.stock < stocks.cantidad_ideal');
                    })
                    ->get();*/


        $stocks = Stock::all();
        return view('items.lista', compact('stocks'));
        //
    }

    public function tableshow()
    {
        $categories = Category::all();
        $items = Stock::all();

        //dd($items->category());
        /*$subquery = DB::table('categories')
                        ->select('id', 'nombre as categ_nombre');
*/
      //  $stock = DB::table('items')
                    /*->joinSub($subquery, 'categorias', function($join) {
                        $join->on('items.categoria', '=', 'categorias.id');
                    })*/
        /*            ->join('categories', 'items.categoria', '=', 'categories.id')

                    ->join('stocks', function($join) {
                        $join->on('items.id', '=', 'stocks.id_item')
                        ->where('stock', '<>', 0);
                    })
                    ->select('items.id, categories.nombre, items.nombre')
                    ->get();

        $no_stock = DB::table('items')
                    //->joinSub($subquery, 'categorias', function($join) {
                      //  $join->on('items.categoria', '=', 'categorias.id');
                   // })
                    ->join('categories', 'items.categoria', '=', 'categories.id')

                    ->join('stocks', function($join) {
                        $join->on('items.id', '=', 'stocks.id_item')
                        ->where('stock', '=', 0);
                    })
                    ->select('items.id, categories.nombre, items.nombre')
                    ->get();

*/
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
    { //Stock $stock
        $this->validate(request(), [
          'cantidad' => 'required',
          'ideal' => 'required',

        ]);
        dd($id);

        $stock = Stock::find($id);
    //$stock->update($request->all());
        $stock->stock = $request->get('cantidad');
        $stock->cantidad_ideal = $request->get('ideal');
        $stock->save();
        dd($stock->cantidad_ideal);

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
