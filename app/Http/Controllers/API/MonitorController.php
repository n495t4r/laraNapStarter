<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Monitor;

class MonitorController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'filfirse' => 'required|mimes:csv,txt',
            'first_name'=> 'required|string|max:70',
            'middle_name'=> 'string|max:70',
            'last_name'=> 'required|string|max:70',
            'phone'=> 'required|string|phone|unique:monitors|max:11',
            'alt_phone'=> 'phone|max:11',
            'email'=> 'required|string|email|unique:monitors',
            'gender'=> 'required', 
            'dob'=> 'required|date',
           
            'origin'=> 'required',
            'lga_origin'=> 'required',
            'residence'=> 'required',
            'lga_residence'=> 'required',
            'marital_status'=> 'required',
            'type'=> 'required',
            'password'=> 'required|string|min:6',
        
        ]);

        Monitor::create($request->all());
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
    public function destroy($id)
    {
        //
    }
}
