<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\LogLoteProduct;
use App\Sale;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventory=Inventory::all();
        foreach ( $inventory as $inv){
           $inv->product;
           $inv->product->logLote;
        }
        return view('inventory.index', ['inventory' => $inventory]);
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
        $inventory=Inventory::where('product_id', $request->id_product);
        if ($inventory->exists()){
            $inventory = $inventory->first();
            $inventory->in_quantity=$inventory->in_quantity + $request->quantity;
        }else{
            $inventory = new Inventory();
            $inventory->in_quantity=$request->quantity;
            $inventory->product_id=$request->id_product;
        }
        $inventory->save();

        $log= new LogLoteProduct();
        $log->pr_expiration_date= $request->expiration;
        $log->product_id= $request->id_product;
        $log->lote= $request->lote;
        $log->save();
        return redirect('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale=Sale::find($id);
        $inventory = Inventory::find(  $sale->product->inventory->id);
        $inventory->in_quantity=$inventory->in_quantity+$sale->sl_quantity;
        $inventory->save();
        $sale->delete();
        return back()->withInput();
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
