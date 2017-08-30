<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class masProducts extends Model
{
    protected $table = 'mas_products';

    public $incrementing = false;

    public $timestamps = false;

    protected $primarykey = 'ProductCode';

    public function opsOrderDetail(){

    	return $this->hasMany('App\opsOrderDetail', 'ProductCode' , 'ProductCode');
    }
}
