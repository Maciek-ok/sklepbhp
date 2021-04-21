<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class CartController extends Controller
{
    public function index()
    {
    	$categories=Category::withCount('products')->get();
    	$cart = \Cart::getContent();
    	$total = \Cart::getSubTotal();
        $cartTotalQuantity = \Cart::getTotalQuantity();

    	return view('basket.basket', compact('cart','categories','total','cartTotalQuantity'));
    }

     public function delete($id)
    {
    	
        \Cart::remove($id);
    	

    	return back()->with([

          'status'=>[
              'type'=>'danger',
              'content'=>'Usunięto produkt z koszyka',
            ]

        ]);
    }
}
