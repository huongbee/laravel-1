<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    protected $table = "products";
    protected $fillable = ['name','id_type','description','unit_price','promotion_price','promotion','image','unit','new_product'];

    public function productType(){
    	return $this->belongsTo('\App\admin\ProductType','id_type','id');
    }
}
