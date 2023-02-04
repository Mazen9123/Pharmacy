<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
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



    public function Add()
    {
        //
        return view("AddProduct");
    }
    public function Edit()
    {
        //
        return view("EditProduct",["product" => Product::Where('id',$_GET['id'])->first()]);
    }



    public function AddProduct(Request $request)
    {
        //
        $request->validate([
            "Name" => "required",
            "Type" => "required|not_in:type",
            "Price" => "required",
            "Stock" => "required",
            "Quantity" => "required",
            "Partial" => "required",
            "Expiry_Date" => "required",
        ]);
        if(Product::Where('name',$request->Name)->Where('type',$request->Type)->first()){
            return redirect()->back()->with(["Error" => "Product Already Exists check it from products instead"]);
        }else{
            Product::create([
                "id" => Product::count() + 1,
                "name" => $request->Name,
                "type" => $request->Type,
                "sub_count" => $request->Sub_Count,
                "sub_price" => $request->Sub_Price,
                "price" => $request->Price,
                "stock" => $request->Stock,
                "quantity" => $request->Quantity,
                "partial" => $request->Partial,
                "expiry_date" => $request->Expiry_Date
            ]);
            return redirect('/Products');
        }
    }


    public function EditProduct(Request $request)
    {
        //
        $request->validate([
            "Name" => "required",
            "Type" => "required|not_in:type",
            "Price" => "required",
            "Stock" => "required",
            "Quantity" => "required",
            "Partial" => "required",
            "Expiry_Date" => "required",
        ]);
        if(Product::Where('id',$request->Id)->first()){
            Product::Where('id',$request->Id)->update([
                "name" => $request->Name,
                "type" => $request->Type,
                "sub_count" => $request->Sub_Count,
                "sub_price" => $request->Sub_Price,
                "price" => $request->Price,
                "stock" => $request->Stock,
                "quantity" => $request->Quantity,
                "partial" => $request->Partial,
                "expiry_date" => $request->Expiry_Date
            ]);
            return redirect('/Products');
        }else{

            return redirect()->back()->with(["Error" => "Product Doesn't Exist Create it first"]);

        }
    }

    public function Del(){
        if(Product::Where('id',$_GET['id'])->first()){
            Product::Where('id',$_GET['id'])->delete();
            $products = Product::get();
            $i = 0;
            foreach($products as $product){
                $product->update([
                    "id" => $i + 1
                ]);
                $i = $i + 1;
            }
            return redirect('/Products');
        }else{

            return redirect('/Products');

        }
    }




    public function Products(){
        return view("Products",["products" => Product::get(),"products_count" => Product::count()]);
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
