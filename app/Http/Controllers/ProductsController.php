<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

use App\masProducts;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index');
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
        $ProductName = $request->input('ProductName');
        $ProductDescription = $request->input('ProductDescription');

        $p = new masProducts;
        $p->ProductCode = $this->nextProductCode();
        $p->ProductName = $ProductName;
        $p->ProductDescription = $ProductDescription;

        $p->save();

        return redirect('product');
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
    public function edit($ProductCode)
    {
        $productInfo = masProducts::where('ProductCode', $ProductCode)->get();
        return view('product.edit', ['productInfo' => $productInfo[0]]) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $ProductCode = $request->input('ProductCode');

        $ProductName = $request->input('ProductName');
        $ProductDescription = $request->input('ProductDescription');

        $updateData = [

            'ProductName' => $ProductName, 
            'ProductDescription' => $ProductDescription,
        ];

        masProducts::where('ProductCode', $ProductCode)->update($updateData);

        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ProductCode)
    {
        masProducts::where('ProductCode', $ProductCode)->delete();

        return redirect('product');
    }

    private function nextProductCode(){

        $dateToday = Carbon::today()->toDateString();
        $dateToday = str_replace("-", "", $dateToday);
        $dateToday = substr($dateToday, 0, 6);

        $lastThisMonth = masProducts::select('ProductCode')->where('ProductCode', 'like' , '%' . $dateToday . '%')->max('ProductCode');

        if(!is_null($lastThisMonth)){

            $lastThisMonth = substr($lastThisMonth, -4, 5);
            $lastThisMonth = intval($lastThisMonth);
            $nextCode = $lastThisMonth + 1;

        }else{
            $nextCode = 1;
        }

        $nextCode = sprintf("%04d", $nextCode);

        return 'P' . $dateToday . $nextCode;
    }
}
