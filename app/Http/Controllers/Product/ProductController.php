<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $products = Product::where('company_id', $request->company_id)->orderBy('id')->get();

        return response()->json([
            'products' => $products
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
        //
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->value = $request->value;
            $product->company_id = $request->company_id;
            $product->save();

            return response()->json([
                'product' => $product
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
        $product = Product::find($id);

        return response()->json([
            'product' => $product
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
        //
        try {
            $product = Product::find($id);
            $product->name = $request->name;
            $product->value = $request->value;
            $product->company_id = $request->company_id;
            $product->save();

            return response()->json([
                'product' => $product
            ]);
        }catch(Exception $e){
            return $e->getMessage();
        }
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
    try{

        $product = Product::find($id);
        $product->delete();
        return response()->json([
            'success' => 'success'
        ]);
    }catch(Exception $e){
        return $e->getMessage();
    }
    }
}
