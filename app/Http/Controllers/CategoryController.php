<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.index', compact('categories'));
    }
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
            $cat= new Category;
            $cat->name = $request->name;
            $cat->slug = $request->slug;
                if ($request->hasFile('icon')) {
                $file = $request->file('icon');
                $extension = $file->getClientOriginalExtension();
                $filename= time().'.'.$extension;;
                $path = public_path().'/CategoryIcon';
                $uplaod = $file->move($path,$filename);
                }
            $cat->image = $filename;
            $cat->save();
            return  'success' ;

        }
    }
    public function show($id)
    {
        $category = Category::find($id);
        return view('backend.category.show',compact('category'));
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit',compact('category'));
    }
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
            $cat= new Category;
            $cat->exists = true;
            $cat->id = $id;
            $cat->name = $request->name;
            $cat->slug = $request->slug;
                if ($request->hasFile('icon')) {
                $file = $request->file('icon');
                $extension = $file->getClientOriginalExtension();
                $filename= time().'.'.$extension;;
                $path = public_path().'/CategoryIcon';
                $uplaod = $file->move($path,$filename);
                $cat->image = $filename;
                }
            $cat->update();
            return redirect()->route('catgeory.index')->with('status','Category Update Successfully');
        }
    }
    public function destroy($id)
    {
        Category::find($id)->delete();
        return back();
    }
}
