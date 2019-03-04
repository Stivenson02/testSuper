<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\Product;
use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales= Sale::where('user_id',Auth::User()->id)->get();
        foreach ($sales as $sale){
            $sale->product;
        }

        return view('sale.index', ['sales' => $sales]);
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
        if ($request->quantity <= $request->inventary){
            $sale= new Sale();
            $sale->sl_quantity= $request->quantity;
            $sale->user_id= Auth::User()->id;
            $sale->product_id= $request->id_product;
            $sale->save();

            $product=Product::find($sale->product_id);
            $product->inventory->in_quantity= $product->inventory->in_quantity -  $sale->sl_quantity;
            $product->inventory->save();
            return redirect('product');

        }else{
            return back()->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=  Product::find($id);
        return view('sale.sale', ['product' => $product]);
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
