<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class opsOrder extends Model
{
    protected $table = 'ops_order';

    public $incrementing = false;

    public $timestamps = false;

    protected $primarykey = 'OrderCode';

    public function masCustomer(){

    	return $this->belongsTo('App\masCustomer', 'CustomerCode', 'CustomerCode');
    }	

    public function opsOrderDetail(){

    	return $this->hasMany('App\opsOrderDetail', 'OrderCode' ,'OrderCode');
    }
}
