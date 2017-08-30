<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class masCustomer extends Model
{
    protected $table = 'mas_customer';

    public $incrementing = false;

    public $timestamps = false;

    protected $primarykey = 'CustomerCode';

    public function opsOrder(){

    	return $this->hasMany('App\opsOrder', 'CustomerCode', 'CustomerCode');
    }
}
