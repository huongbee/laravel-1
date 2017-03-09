<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\M_ProductType;
use App\M_Product;
use Session;
use App\Cart;

class ProductType extends Controller
{
    public function getType(){
    	$type = M_ProductType::all();
    	return view('pages.trangchu.index',['type'=>$type]);
    }

    public function getProductByType($id){
    	$sanpham = M_Product::where('id_type',$id)->paginate(6); 
    	
    	$type = M_ProductType::all(); 
        if(!Session::has('cart')){
            return view('pages.trangchu.index',["data"=>$data,'type'=>$type]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
    	return view('pages.sanpham.loaisp',['sanpham'=>$sanpham,'type'=>$type, 'products'=>$cart->items]);

    }
}
