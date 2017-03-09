<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'type_products';

   /* public function sanpham(){
    	return $this->hasMany('app\Sanpham','id_type','id');
    }*/
}
