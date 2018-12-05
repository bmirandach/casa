<?php

namespace App\Http\Controllers;

use App\Item;
use DB;
use App\Category;
use App\Stock;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //Item::all(); ->select('nombre')


        //return $items;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

         return view('items.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'name' => 'required',
          'combo' => 'required',

        ]);
        $item = Item::make();
        $item->nombre = $request->input('name');
        $item->categoria = $request->input('combo');
        $item->save();

        $id_it = DB::table('items')->where('items.nombre', 'like', $item->nombre)->get();


        $stock = Stock::make();
        foreach ($id_it as $key) {
            $stock->id_item = $key->id;
        }
        $stock->id_house = 1;
        $stock->stock = 0;
        $stock->volumen = null;
        $stock->unidad = null;
        $stock->cantidad_ideal = 0;
        $stock->usuario_modifica = 2;
        $stock->save();



        return redirect()->route('search')
                        ->with('success', 'Nuevo item creado');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
