<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class OrderController extends Controller
{
    public function store(Request $request)
    {
    	//pobieranie zawartosci koszyka
    	$cart = \Cart::getContent();
    	
    	// całkowita cena z koszyka
    	$total_price = \Cart::getTotal();

    	//dd($cart->pluck('id'));
    	



    	//dodawanie zamówienia konkretnemu uzytnikowi 
    	$order = new Order;

    	
        $order->user_id = Auth::user()->id;
		$order->price=$total_price;
        

        $order->save();
        //dd($order);
        

        //dodawanie prduktów zamówienia 
        foreach ($cart->pluck('id') as $id) {
        	# code...
        
        

        $order->products()->create([

           'product_id'=>$id,
        ]);
        }
        
       


             return back()->with([

                   'status'=>[
                   'type'=>'danger',
                   'content'=>'złozono zamówienie',
               ]
            ]);

    }
}
