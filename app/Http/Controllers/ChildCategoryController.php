<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = SubCategory::all();
        $childcategory = ChildCategory::all();
        return view('backend.chlidcategory.index', compact('categories','childcategory'));
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
        $validator = Validator::make($request->all(),[
            'name'=> 'required|max:255|min:3',
            'icon'=> 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'error'=> $validator
            ]);
        }else{
            $cat= new ChildCategory;
            $cat->name = $request->name;
            $cat->slug = $request->slug;
            $cat->sub_category_id  = $request->category_id;
                if ($request->hasFile('icon')) {
                $file = $request->file('icon');
                $extension = $file->getClientOriginalExtension();
                $filename= time().'.'.$extension;;
                $path = public_path().'/ChildCategoryIcon';
                $uplaod = $file->move($path,$filename);
                }
            $cat->icon = $filename;
            $cat->save();
            return  'success' ;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = ChildCategory::find($id);
        return view('backend.chlidcategory.show',compact('category'));
    }
    public function edit($id)
    {
        $childcategory =ChildCategory::find($id) ;
        return view('backend.chlidcategory.edit',compact('childcategory'));
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
        $validator = Validator::make($request->all(),[
            'name'=> 'required|max:255|min:3',
            'icon'=> 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'error'=> $validator
            ]);
        }else{
            $cat= new ChildCategory;
            $cat->exists = true;
            $cat->id = $id;
            $cat->name = $request->name;
            $cat->sub_category_id  = $request->category_id ;
            $cat->slug = $request->slug;
                if ($request->hasFile('icon')) {
                $file = $request->file('icon');
                $extension = $file->getClientOriginalExtension();
                $filename= time().'.'.$extension;;
                $path = public_path().'/ChildCategoryIcon';
                $uplaod = $file->move($path,$filename);
                $cat->icon = $filename;
                }
            $cat->save();
            return redirect()->route('childcategory.index')->with('status','Category Update Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ChildCategory::find($id)->delete();
        return back();
    }
    public function getChildCat(Request $request)
    {
        $category = ChildCategory::where('sub_category_id',$request->id)->get();
        return $category;
    }
}
