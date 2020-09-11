<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;
use App\City;
use App\State;
use App\Category;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Http\Resources\InfoResource;
class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //    $this->middleware('admin');
    // }


    public function index()
    {
        $infos = Info::all();
        $citys = City::all();
        $states = State::all();
        $categories = Category::all();

      
        return view('info.index',compact('infos','citys','states','categories'));
        //
    }

    // public function detail1()
    // {
    //     // $info=Info::find();
    //     //return view('hometemplate.detail1',compact('info'));
    //     return view('hometemplate.detail1');
        
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $listings=Listing::all();
        // return view('info.create',compact('listings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            //input name
           'place_name' =>'required',
           'photo'      =>'required',
           'location'   =>'required',
           'wonderful'  =>'required',
           'city'       =>'required',
           'category'   => 'required',
           'state'      => 'required',
           'best_month' => 'required',
           'recommend'  => 'required',
           'lat'        => 'required',
           'long'       => 'required',
           'description'=>'required|min:5',


       ]);

                //upload file
        if ($request->file('photo')) {
                      $photo=$request->file('photo');
                    $name=uniqid().time().'.'.$photo->getClientOriginalExtension();
                    $photo->move(public_path('image/'),$name);
                    $path='/image/'.$name;
                    $image=$path;
               
             
        }

        //data save
        Info::create([
            //table column name
            'place_name'    =>   request('place_name'),
            'image'         =>   $image,
            'wonderful'     =>   request('wonderful'),
            'best_month'    =>   request('best_month'),
            'map'           =>   request('map'),
            'recommend'     =>   request('recommend'),
            'category_id'   =>   request('category'),
            'city_id'       =>   request('city'),
            'state_id'      =>   request('state'),   
            'location'      =>   request('location'),
            'lat'           =>   request('lat'),
            'long'          =>   request('long'),
            'description'   =>   request('description'),
            'status'          => 1

        ]);
        return redirect()->route('info.index');

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
        $infos=DB::table('infos')
            ->where('infos.id',$id)
            ->get();
       
        // return view('info.show',compact('info'));
         $infos=InfoResource::collection($infos);

        return response()->json([
            'infos' => $infos
        ],200);
       
        //return view('info.index');
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
        $info=Info::find($id);
        $citys = City::all();
        $states = State::all();
        $categories = Category::all();

         

        return view('info.edit',compact('info','citys','states','categories'));
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

              //validation
//validation
       $request->validate([
            //input name
           'edit_place_name' => 'required',
           'edit_location'   => 'required',
           'edit_wonderful'  => 'required',
           'city'       => 'required',
           'category'   => 'required',
           'state'      => 'required',
           'edit_best_month'      => 'required',
           'edit_recommend'  => 'required',
           'edit_lat'        => 'required',
           'edit_long'       => 'required',
           'edit_description'=> 'required|min:5',


       ]);

                //upload file
        if ($request->file('photo')) {
                  $photo=$request->file('photo');
                    $name=uniqid().time().'.'.$photo->getClientOriginalExtension();
                    $photo->move(public_path('image/'),$name);
                    $path='/image/'.$name;
                    $image=$path;
               
             
        }else{
            $image = request('old_photo');
        }

        //data save
       $info = Info::find($id);
            $info->place_name    =   request('edit_place_name');
            $info->image         =   $image;
            $info->wonderful     =   request('edit_wonderful');
            $info->best_month    =   request('edit_best_month');
            $info->map           =   request('edit_map');
            $info->recommend     =   request('edit_recommend');
            $info->category_id   =   request('category');
            $info->city_id       =   request('city');
            $info->state_id      =   request('state');   
            $info->location      =   request('edit_location');
            $info->lat           =   request('edit_lat');
            $info->long          =   request('edit_long');
            $info->description   =   request('edit_description');
            $info->save();

        // return response()->json([
        //     'message'   =>  'Info updated successfully!'
        // ],200);
        //redirect
        return redirect()->route('info.index');

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
        $info=Info::find($id);
        $info->delete();
        return redirect()->route('info.index');
    }
}
