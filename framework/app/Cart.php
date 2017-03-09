<?php

namespace App;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;
	//public $input = Input::all();

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;			
		}
	}

	public function add($item, $id){
		$giohang = ['qty'=>0, 'price' => $item->unit_price, 'item' => $item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
			}
		}
		/*if($input('qty')){
			$giohang['qty'] += (int) $input('qty') ;
		}
		else{*/
			$giohang['qty']++;
		//}
		$giohang['price'] = $item->unit_price * $giohang['qty'];
		$this->items[$id] = $giohang;
		$this->totalQty++;
		$this->totalPrice += $item->unit_price;
	}
}
