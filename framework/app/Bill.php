<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
	protected $fillable = ['id_customer', 'total'];
    protected $table = 'bills';

    public function billOfCustomer(){
    	return $this->belongsTo('App\Customer');
    }
}
