<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

use App\masCustomer;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.index');
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $FirstName = $request->input('FirstName');
        $LastName = $request->input('LastName');
        $IDCard = $request->input('IDCard');
        $Tel = $request->input('Tel');

        $c = new masCustomer;
        $c->CustomerCode = $this->nextCustomerCode();
        $c->FirstName = $FirstName;
        $c->LastName = $LastName;
        $c->IDCard = $IDCard;
        $c->Tel = $Tel;

        $c->save();

        return redirect('customer');
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
    public function edit($CustomerCode)
    {
        $customerInfo = masCustomer::where('CustomerCode', $CustomerCode)->get();
        return view('customer.edit', ['customerInfo' => $customerInfo[0]]) ;
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
        $CustomerCode = $request->input('CustomerCode');

        $FirstName = $request->input('FirstName');
        $LastName = $request->input('LastName');
        $IDCard = $request->input('IDCard');
        $Tel = $request->input('Tel');

        $updateData = [

            'FirstName' => $FirstName, 
            'LastName' => $LastName,
            'IDCard' => $IDCard,
            'Tel' => $Tel
        ];

        masCustomer::where('CustomerCode', $CustomerCode)->update($updateData);

        return redirect('customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($CustomerCode)
    {
        masCustomer::where('CustomerCode', $CustomerCode)->delete();

        return redirect('customer');
    }

    private function nextCustomerCode(){

        $dateToday = Carbon::today()->toDateString();
        $dateToday = str_replace("-", "", $dateToday);
        $dateToday = substr($dateToday, 0, 6);
        
        $lastThisMonth = masCustomer::select('CustomerCode')->where('CustomerCode', 'like' , '%' . $dateToday . '%')->max('CustomerCode');
        
        if(!is_null($lastThisMonth)){

            $lastThisMonth = substr($lastThisMonth, -4, 5);
            $lastThisMonth = intval($lastThisMonth);
            $nextCode = $lastThisMonth + 1;

        }else{
            $nextCode = 1;
        }

        $nextCode = sprintf("%04d", $nextCode);

        return 'C' . $dateToday . $nextCode;
    }
}
