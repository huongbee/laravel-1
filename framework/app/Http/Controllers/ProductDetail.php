<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\M_ProductDetail;
use App\Cart;
use Session;

class ProductDetail extends Controller
{
    public function getDetailProduct($id){
    	$detail = M_ProductDetail::where('id',$id)->get();
    	if(!Session::has('cart')){
    		return view('pages.chitiet.detail',['detail'=>$detail]);
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	return view('pages.chitiet.detail',['detail'=>$detail, 'products'=>$cart->items,'totalPrice'=> $cart->totalPrice]);
    }
}
