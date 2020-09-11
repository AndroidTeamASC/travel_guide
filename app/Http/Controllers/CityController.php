<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
class CityController extends Controller
{
    /**
     * Display a citying of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*SS*/
    public function index()
    {
        
        $citys=City::all();
        
        
        return view('city.index',compact('citys'));
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
        //
        $request->validate([
            //input name
         'name'    =>'required|min:2',

     ]);
     
        // dd($request);

        City::create([
            'name'     =>request('name')
        ]);

     
     
        return redirect()->route('city.index');

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
        $City=City::find($id);
        return view('city.show',compact('city'));
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
     $city=City::find($id);

     return view('city.edit',compact('city'));
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
         //
        $request->validate([
            //input name
         'edit_name'=>'required|min:2'

     ]);
               $city=City::find($id);
        $city->name=request('edit_name');
        $city->save();
        //redirect
        return redirect()->route('city.index');
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
        $city=City::find($id);
        $city->delete();
        return redirect()->route('city.index');
    }
}

