<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Auth;
use App\Http\Resources\categoryResource;

class CategoryController extends Controller
{
    /**
     * Display a categorying of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*SS*/
    public function index()
    {
        
        $categories=Category::all();
        
        
        return view('category.index',compact('categories'));
    }

    public function detail()
    {
        return view('hometemplate.detail');
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
         'category_name'    =>'required|min:2',
         'category_image'   =>'required'

     ]);
         if($request->hasfile('category_image')){
            $image=$request->file('category_image');
            $name=time().'.'.$image->getClientOriginalName();
            $image->move(public_path().
                '/image/',$name);
            $photo='/image/'.$name;
        }

        // dd($request);

        Category::create([
            'category_name'     =>request('category_name'),
            'category_image'    =>$photo
        ]);

     
     
        return redirect()->route('category.index');

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
        $category=Category::find($id);
        return view('category.show',compact('category'));
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
     $category=Category::find($id);

     return view('category.edit',compact('category'));
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
         'category_name'=>'required|min:2'

     ]);
         if($request->hasfile('category_image')){
            $image=$request->file('category_image');
            $name=time().'.'.$image->getClientOriginalName();
            $image->move(public_path().
                '/image/',$name);
            $photo='/image/'.$name;
        }else {
            $photo = request('old_image');
        }
        $category=Category::find($id);
        $category->category_name=request('category_name');
        $category->category_image = $photo;
        $category->save();
        //redirect
        return redirect()->route('category.index');
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
        $category=Category::find($id);
        $category->delete();
        return redirect()->route('category.index');
    }
}
