<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $fillable = ['name_customer', 'gender', 'address', 'email', 'phone_number', 'note', 'create_at', 'update_at'];
    
    protected $table = 'customer';
    public $timestamps = false;

    public function Order(){
    	return $this->hasMany('App\Order');
    }

    public function Bill(){
    	return $this->hasMany('App\Bill');
    }
}
