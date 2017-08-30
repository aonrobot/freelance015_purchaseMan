<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class opsOrderDetail extends Model
{
    protected $table = 'ops_orderdetail';

    public $timestamps = false;

    protected $primarykey = 'OrderDetailID';

    public function opsOrder(){

    	return $this->belongsTo('App\opsOrder', 'OrderCode', 'OrderCode');
    }

    public function masProducts(){

    	return $this->belongsTo('App\masProducts', 'ProductCode', 'ProductCode');
    }
}
