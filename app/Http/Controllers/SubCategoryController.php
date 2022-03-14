<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('backend.subcategory.index', compact('categories','subcategories'));
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
            $cat= new SubCategory;
            $cat->name = $request->name;
            $cat->slug = $request->slug;
            $cat->category_id = $request->category_id;
                if ($request->hasFile('icon')) {
                $file = $request->file('icon');
                $extension = $file->getClientOriginalExtension();
                $filename= time().'.'.$extension;;
                $path = public_path().'/SubCategoryIcon';
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
        $category = SubCategory::find($id);
        return view('backend.subcategory.show',compact('category'));
    }
    public function edit($id)
    {
        $subcategory = SubCategory::find($id);
        return view('backend.subcategory.edit',compact('subcategory'));
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
            $cat= new SubCategory;
            $cat->exists = true;
            $cat->id = $id;
            $cat->name = $request->name;
            $cat->slug = $request->slug;
                if ($request->hasFile('icon')) {
                $file = $request->file('icon');
                $extension = $file->getClientOriginalExtension();
                $filename= time().'.'.$extension;;
                $path = public_path().'/SubCategoryIcon';
                $uplaod = $file->move($path,$filename);
                $cat->image = $filename;
                }
            $cat->save();
            return redirect()->route('catgeory.index')->with('status','Category Update Successfully');
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
        SubCategory::find($id)->delete();
        return back();
    }
    public function getSubCat(Request $request)
    {
        $category = SubCategory::where('category_id',$request->id)->get();
        return $category;
    }

}
