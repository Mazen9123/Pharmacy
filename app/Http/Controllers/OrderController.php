<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }




    public function New()
    {
        //
        return view("NewOrder",["products" => Product::get()]);
    }

    public function addToCart(Request $request){
        $str = $request->name;
$start  = strpos($str, '(');
$end    = strpos($str, ')', $start + 1);
$length = $end - $start;
$result = substr($str, $start + 1, $length - 1);
       
$product = Product::Where('id',$result)->first();
if(Cart::Where('name',$product->name)->Where('type',$product->type)->first()){
    return response()->json(Cart::all());
}else{

    Cart::create([
        "id" => Cart::count() + 1,
        "name" => $product->name,
        "price" => $product->price,
        "type" => $product->type,
        "sub_type" => "Type",
        "total_price" => $product->price,
        "quantity" => "1"
    ]);




return response()->json(Cart::all());

}





    }




    public function cartItems(){
        return response()->json(Cart::all());
    }



    public function changeType(Request $request){

        if($request->sub_type == 'Pack' || $request->sub_type == 'Type'){
            $item = Cart::Where('id',$request->id)->first();
            $product = Product::Where('name',$item->name)->Where('type',$item->type)->first();
            Cart::Where('id',$request->id)->update(["sub_type" => $request->sub_type,"total_price" => ($product->price * $item->quantity)]);
        }else{
            $item = Cart::Where('id',$request->id)->first();
            $product = Product::Where('name',$item->name)->Where('type',$item->type)->first();
            Cart::Where('id',$request->id)->update(["sub_type" => $request->sub_type,"total_price" => ($product->sub_price * $item->quantity)]);
        }
        return response()->json(Cart::all());
    }


    public function removeItem(Request $request){
        Cart::Where('id',$request->id)->delete();
        $cartItems = Cart::all();
        $i = 0;
        foreach($cartItems as $cartItems){
            $cartItems->update([
                "id" => $i + 1
            ]);
            $i = $i + 1;
        }
        return response()->json(Cart::all());
    }





    public function incQuantity(Request $request){
        $item = Cart::Where('id',$request->id)->first();
        $product = Product::Where('name',$item->name)->Where('type',$item->type)->first();
        if($item->sub_type == 'Pack' || $item->sub_type == 'Type'){
            Cart::Where('id',$request->id)->update(["quantity" => ($item->quantity + 1),"total_price" => ($product->price * ($item->quantity + 1))]);
        }else{
            Cart::Where('id',$request->id)->update(["quantity" => ($item->quantity + 1),"total_price" => ($product->sub_price * ($item->quantity + 1))]);
        }
    
        return response()->json(Cart::all());
    }

    public function decQuantity(Request $request){
        $item = Cart::Where('id',$request->id)->first();
        $product = Product::Where('name',$item->name)->Where('type',$item->type)->first();
        if($item->quantity > 1){
        if($item->sub_type == 'Pack' || $item->sub_type == 'Type'){
            Cart::Where('id',$request->id)->update(["quantity" => ($item->quantity - 1),"total_price" => ($product->price * ($item->quantity - 1))]);
        }else{
            Cart::Where('id',$request->id)->update(["quantity" => ($item->quantity - 1),"total_price" => ($product->sub_price * ($item->quantity - 1))]);
        }
    
        return response()->json(Cart::all());
        }

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
