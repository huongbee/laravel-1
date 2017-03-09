<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\M_Product;
use App\M_ProductType;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;

class Product extends Controller
{
    public function getProduct(){
    	$data = M_Product::paginate(6);
    	$type = M_ProductType::all();
    	
		if(!Session::has('cart')){
    		return view('pages.trangchu.index',["data"=>$data,'type'=>$type]);
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	//return view('pages.trangchu.index', ['products'=>$cart->items,'totalPrice'=> $cart->totalPrice]);

    	return view("pages.trangchu.index",["data"=>$data,'type'=>$type, 'products'=>$cart->items,'totalPrice'=> $cart->totalPrice]);
    }

    public function getAddToCart(Request $req, $id){
    	$product = M_Product::find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->add($product, $product->id);

    	$req->session()->put('cart', $cart);
    	return redirect()->back();
    }

    /*public function getCart(){
    	if(!Session::has('cart')){
    		return view('pages.trangchu.index');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	return view('pages.trangchu.index', ['products'=>$cart->items,'totalPrice'=> $cart->totalPrice]);
    }*/

    public function getCheckout(){
    	if(Session::has('cart')){
    		$oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            //dd($req->session()->get('cart'));
            return view('pages.checkout.dathang',['products'=>$cart->items,'totalPrice'=> $cart->totalPrice]);
    	}
    	return redirect()->route('index');//->with('infor','Giỏ hàng rỗng');
    }

    public function postCheckout(Request $req){
        $this->validate($req,
            [
                'email'=>'email|required|max:100|unique:customer,email,',//users : tên table
                'fullname'=>'required|max:100|min:10',
                'phone'=>'required|min:8|numeric'
            ],
            [
                'email.email'=>'Email chưa đúng định dạng',
                'email.required'=>'Nhập email',
                'fullname.required' => 'Nhập họ tên',
                'phone.numeric' => 'Vui lòng nhập số'
            ]
        );
        $customer = new Customer([
            'name_customer' => $req->input('fullname'),
            'gender' => $req->input('gender'),
            'address' => $req->input('address'),
            'email' => $req->input('email'),
            'phone_number' => $req->input('phone'),
            'note' => $req->input('notes')
        ]);
        $customer->save();

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $bill = new Bill([
            'id_customer' => $customer->id,
            'total' => $cart->totalPrice
        ]);
        $bill->save();
        if(!$bill->save()){
            $customer->where('id',$customer->id)->delete();
        }
        Session::forget('cart');
        return redirect()->route('checkout')->with('success ','Đặt hàng thành công');
    }
    public function getDelCart(){

    }
    
}
