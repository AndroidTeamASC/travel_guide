<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\City;
use App\Emergency;
class EmergencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states =  State::all();
        $citys= City::all();
        $emergencies = Emergency::all();
        return view('emergency.index',compact('states','citys','emergencies'));
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
        $request->validate([
            'station' => 'required',
            'phone'   => 'required',
            'location'=> 'required',
            'city'    => 'required',
            'state'   => 'required'    
        ]);

        $emergency = new Emergency;
        $emergency->station = request('station');
        $emergency->phone   = request('phone');
        $emergency->location= request('location');
        $emergency->city_id = request('city');
        $emergency->state_id= request('state');
        $emergency->save();

        return redirect()->route('emergency.index'); 
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
       $emergency = Emergency::find($id);
       $citys = City::all();
       $states = State::all();
       return  view('emergency.edit',compact('emergency','citys','states')); 
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
           
        $request->validate([
            'station' => 'required',
            'phone'   => 'required',
            'location'=> 'required',
            'city'    => 'required',
            'state'   => 'required'    
        ]);

        $emergency = Emergency::find($id);
        $emergency->station = request('station');
        $emergency->phone   = request('phone');
        $emergency->location= request('location');
        $emergency->city_id = request('city');
        $emergency->state_id= request('state');
        $emergency->save();

        return redirect()->route('emergency.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emergency = Emergency::find($id);
        $emergency->delete();
        return redirect()->route('emergency.index');
    }
}
