<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductCart;
use App\Models\Cart;
use Exception;

class CartController extends Controller
{

    private $client_id = 1;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        try{
            $product = Product::find($request->product_id);

            $cart = Cart::where('client_id', $this->client_id)->where('company_id', $product->company_id)->first();

            if($cart){

            } else {
                $cart = new Cart;
                $cart->client_id = $this->client_id;
                $cart->company_id = $product->company_id;
                $cart->save();
            }

            $productCart = ProductCart::where('cart_id', $cart->id)->where('product_id', $product->id)->first();

            if($productCart){
                $productCart->quantity = $productCart->quantity + $request->quantity;
                
            } else {
                $productCart = new ProductCart;
                $productCart->product_id = $product->id;
                $productCart->cart_id = $cart->id;
                $productCart->quantity = $request->quantity;
            }

            $productCart->save();

            return response()->json([
                'productCart' => $productCart
            ]);
        }catch(Exception $e){
            return $e->getMessage();
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
