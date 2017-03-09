<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_Product extends Model
{
	protected $table = "products";

	public function productType(){
		return $this->belongsTo("App\ProductType","id_type","id");
	}

	public function billDetail(){
		return  $this->hasMany('App\M_ChitietHoadon','id_product','id');
	}
}
