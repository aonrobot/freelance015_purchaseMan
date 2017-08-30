<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\opsOrderDetail;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $OrderCode = $request->input('OrderCode');
        $ProductCode = $request->input('ProductCode');
        $QTY = $request->input('QTY');

        $od = new opsOrderDetail;
        $od->OrderCode = $OrderCode;
        $od->ProductCode = $ProductCode;
        $od->QTY = $QTY;

        $od->save();

        return redirect(asset('order/edit/' . $OrderCode));
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($OrderDetailID)
    {
        $OrderCode = opsOrderDetail::where('OrderDetailID', $OrderDetailID)->select('OrderCode')->get();

        opsOrderDetail::where('OrderDetailID', $OrderDetailID)->delete();

        return redirect(asset('order/edit/' . $OrderCode[0]['OrderCode']));
    }
}
