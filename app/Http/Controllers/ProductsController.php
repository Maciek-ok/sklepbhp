<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;




class ProductsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       // $product=Product::with('category')->first();
        //dd($product);

        

        //pobieranie produktów 
        $products=Product::paginate(3);
        //zlicza ile szkoneń jest z danej kategori
        $categories=Category::withCount('products')->get();
        //$id=Category::get('id');
        
       // dd($categories);
       

        return view ('main', compact('products','categories'));
    }

    public function show($product_id)
    {
       
       $products=Product::findOrFail($product_id);
       //dd($products->firstPhoto());
       $categories=Category::withCount('products')->get();
       $cartCollection = \Cart::getContent();
       //dd($cartCollection);

        return view ('card', compact('products','categories'));
    }

    public function add_to_cart($product_id, Request $request)
    {
        //$products=Product::findOrFail($product_id);
        //dd($request->input('amount'));
        $products=Product::findOrFail($product_id);
       \Cart::add($products->id, $products->name, $products->price, $request->input('amount'));
        
        return back()->with([

          'status'=>[
              'type'=>'success',
              'content'=>'Dodoano produkt do koszyka',
            ]

        ]);
    }
}
