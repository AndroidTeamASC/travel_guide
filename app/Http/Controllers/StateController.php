<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
class StateController extends Controller
{
    /**
     * Display a stateing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*SS*/
    public function index()
    {
        
        $states=State::all();
        
        
        return view('state.index',compact('states'));
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

        state::create([
            'name'     =>request('name')
        ]);

     
     
        return redirect()->route('state.index');

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
        $state=state::find($id);
        return view('state.show',compact('state'));
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
     $state=state::find($id);

     return view('state.edit',compact('state'));
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
               $state=state::find($id);
        $state->name=request('edit_name');
        $state->save();
        //redirect
        return redirect()->route('state.index');
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
        $state=state::find($id);
        $state->delete();
        return redirect()->route('state.index');
    }
}