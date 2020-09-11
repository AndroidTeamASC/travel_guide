<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Resources\InfoResource;
use App\Info;
use App\Comment;
use Illuminate\Support\Facades\DB;
use Validator;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos = Info::all();
        $infos=InfoResource::collection($infos);

        return response()->json([
            'infos' => $infos
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // echo $request->image; die();
          // validation
     $validator = Validator::make($request->all(), [
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
           'map'        => 'required'


       ]);

      if ($validator->fails()) {
          return  response()->json(['errors'=>$validator->errors()]);
        }

       // echo $request->place_name;die();

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
            'status'          => 0

        ]);

       

        return response()->json([
                'message'   => "Insert Successful!!"   
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info = Info::find($id);
        $info = InfoResource::make($info);
        return response()->json([
            'info' => $info
        ]);

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
            //input name
           'place_name' => 'required',
           'location'   => 'required',
           'wonderful'  => 'required',
           'city'       => 'required',
           'category'   => 'required',
           'state'      => 'required',
           'best_month'      => 'required',
           'recommend'  => 'required',
           'lat'        => 'required',
           'long'       => 'required',
           'description'=> 'required|min:5',


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
            $info->place_name    =   request('place_name');
            $info->image         =   $image;
            $info->wonderful     =   request('wonderful');
            $info->best_month    =   request('best_month');
            $info->map           =   request('map');
            $info->recommend     =   request('recommend');
            $info->category_id   =   request('category');
            $info->city_id       =   request('city');
            $info->state_id      =   request('state');   
            $info->location      =   request('location');
            $info->lat           =   request('lat');
            $info->long          =   request('long');
            $info->description   =   request('description');
            $info->save();

        

        return response()->json([
            'message'   =>  'Info updated successfully!'
        ],200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = Info::find($id);
        $info->delete();

        return response()->json([
            'message' => 'Delete Successful!!'
        ]);
    }

    public function searcheByName(Request $request ){
     $searchval = request('searchval');
        

        if($searchval!='')
        {
            $infos = Info::where('infos.place_name','like','%'.$searchval.'%','and','infos.permission','=','1')->get();

        }
        $infos = InfoResource::collection($infos);
        return response()->json(['infos' => $infos]);
    } 



    public function filterybyCategoryId(Request $request){
           
        if($category_id=request('category_id')){
          
        $infos=DB::table('infos')
        ->join('categories','categories.id','=','infos.category_id')
        ->select('infos.*')
        ->where('infos.category_id', '=', $category_id)
        ->get();
            //dd($infos);
        }
        $infos =  InfoResource::collection($infos);
        return response()->json([
            'infos' => $infos
        ]);
        //
    
    }

     public function getComment(Request $request)
    {
        Comment::create([
            'info_id' => request('info_id'),
            'comment' => request('comment'),
            'user_id' => 1
        ]) ;

        return response()->json([
            'message' => "Successful"
        ]);
    }

    public function searchbycity(Request $request)
    {
        $state_id = request('state_id');
        $city_id  = request('city_id');
        echo $state_id+$city_id;
        $info = DB::table('infos')
                ->join('cities','cities.id','=','infos.city_id')
                ->join('states','states.id','=','infos.state_id')
                ->join('categories','categories.id','=','infos.category_id')
                ->where('infos.city_id','=',$city_id)
                ->where('infos.state_id','=',$state_id)
                ->select('infos.*')
                ->get();
        $info = InfoResource::collection($info);
        return response()->json([
            'info' => $info
        ]);                
    }
}
