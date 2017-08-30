<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

use App\opsOrder;

use App\masCustomer;

use App\masProducts;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerList = masCustomer::all();
        return view('order.index',['customerList' => $customerList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $CustomerCode = $request->input('CustomerCode');

        $o = new opsOrder;
        $o->OrderCode = $this->nextProductCode();
        $o->CustomerCode = $CustomerCode;
        $o->OrderDate = Carbon::today()->toDateString();

        $o->save();

        return redirect('order.edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($OrderCode)
    {
        $orderInfo = opsOrder::where('OrderCode', $OrderCode)->with('masCustomer')->get();
        $customerList = masCustomer::all();
        $productList = masProducts::all();
        return view('order.edit', [
            'orderInfo' => $orderInfo[0], 
            'customerList' => $customerList,
            'productList' => $productList
        ]) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $OrderCode)
    {
        $CustomerCode = $request->input('CustomerCode');
        $IsActive = $request->input('IsActive');

        $updateData = [

            'CustomerCode' => $CustomerCode, 
            'IsActive' => $IsActive,
        ];

        opsOrder::where('OrderCode', $OrderCode)->update($updateData);

        return redirect(asset('order/edit/' . $OrderCode));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($OrderCode)
    {
        opsOrder::where('OrderCode', $OrderCode)->delete();

        return redirect('order');
    }

    private function nextProductCode(){

        $dateToday = Carbon::today()->toDateString();
        $dateToday = str_replace("-", "", $dateToday);
        $dateToday = substr($dateToday, 0, 6);

        $lastThisMonth = opsOrder::select('OrderCode')->where('OrderCode', 'like' , '%' . $dateToday . '%')->max('OrderCode');

        if(!is_null($lastThisMonth)){

            $lastThisMonth = substr($lastThisMonth, -4, 5);
            $lastThisMonth = intval($lastThisMonth);
            $nextCode = $lastThisMonth + 1;

        }else{
            $nextCode = 1;
        }

        $nextCode = sprintf("%04d", $nextCode);

        return 'O-' . $dateToday . $nextCode;
    }
}
