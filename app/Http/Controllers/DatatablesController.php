<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\masCustomer;

use App\masProducts;

use App\opsOrder;

use App\opsOrderDetail;

use Yajra\Datatables\Datatables;


class DatatablesController extends Controller
{
	public function getIndex(){
		return 1;
	}

    public function customerData(){

    	$customer = masCustomer::select(['CustomerCode', 'FirstName', 'LastName', 'IDCard', 'Tel']);

        return Datatables::of($customer)
            ->addColumn('edit_action', function ($customer) {
                return '<a href="customer/edit/'.$customer->CustomerCode.'" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a>';
            })
            ->addColumn('delete_action', function ($customer) {
                return '<a href="customer/delete/'.$customer->CustomerCode.'" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Delete</a>';
            })
            ->make(true);
    }

    public function productData(){

        $product = masProducts::select(['ProductCode', 'ProductName', 'ProductDescription']);

        return Datatables::of($product)
            ->addColumn('edit_action', function ($product) {
                return '<a href="product/edit/'.$product->ProductCode.'" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a>';
            })
            ->addColumn('delete_action', function ($product) {
                return '<a href="product/delete/'.$product->ProductCode.'" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Delete</a>';
            })
            ->make(true);
    }

    public function orderData(){

        $order = opsOrder::select(['OrderCode', 'CustomerCode', 'OrderDate'])->with(['masCustomer' => function($query){ $query->select('CustomerCode', 'FirstName','LastName'); }]);

        return Datatables::of($order)
            ->addColumn('edit_action', function ($order) {
                return '<a href="order/edit/'.$order->OrderCode.'" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a>';
            })
            ->addColumn('delete_action', function ($order) {
                return '<a href="order/delete/'.$order->OrderCode.'" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Delete</a>';
            })
            ->make(true);
    }

    public function orderDetailData($OrderCode){

        $orderDetail = opsOrderDetail::where('OrderCode', $OrderCode)->select(['OrderDetailID', 'OrderCode', 'ProductCode', 'QTY'])->with(['masProducts' => function($query){
                $query->select('ProductCode', 'ProductName', 'ProductDescription');
        }]);

        return Datatables::of($orderDetail)
            ->addColumn('delete_action', function ($orderDetail) {

                $deleteUrl = asset('orderdetail/delete/'. $orderDetail->OrderDetailID);

                return '<a href="'. $deleteUrl .'" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Delete</a>';
            })
            ->make(true);
    }
}
