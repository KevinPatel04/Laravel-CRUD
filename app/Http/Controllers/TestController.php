<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\testModel;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        \DB::enableQueryLog();
        return $this->middleware('auth');
    }

    public function index()
    {
        $test=testModel::all();
        \Log::info(\DB::getQueryLog());
        return view('test.index',['test' => $test]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        testModel::create($request->all());
        return redirect('test');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $test=testModel::find($id);
        return view('test.show')->with(['test' => $test]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test=testModel::find($id);
        return view('test.edit')->with(['test' => $test]);
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

        $data=$request->all();
        $test=testModel::find($id);
        
        $test->FNAME = $data['FNAME'];
        $test->LNAME = $data['LNAME'];
        $test->GENDER = $data['GENDER'];
        $test->DOB = $data['DOB'];
        $test->ADDRESS1 = $data['ADDRESS1'];
        $test->LANDMARK = $data['LANDMARK'];
        $test->CONTACT_NUMBER = $data['CONTACT_NUMBER'];
        $test->CITY = $data['CITY'];
        $test->COUNTRY = $data['COUNTRY'];
        $test->STATE = $data['STATE'];
        $test->PINCODE = $data['PINCODE'];

        $test->save();      

        //$test=testModel::find($id)->update($request->all())->dump();
        $test=testModel::find($id);
        //echo "<script>alert('HELLO');console.log(Hello ".dd($id).");</script>";
        return redirect('/test/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        testModel::find($id)->delete();
        return redirect('/test');
    }
}
