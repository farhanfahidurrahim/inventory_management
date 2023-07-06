<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title='All Product';
        $data=Product::all();
        return view('backend.product.index',compact('page_title','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $suppliers=Supplier::with('category','supplier')->get();
        return view('backend.product.create',compact('categories','suppliers'));
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
            'name'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:2048',
            'category_id'=>'required',
            'supplier_id'=>'required',
        ]);
        if ($request->hasFile('image')) {
            $imgName=date('YmdHs').'.'.$request->file('image')->extension();
            Image::make($request->file('image'))->resize(600,400)->save(public_path('/uploads/products/').$imgName);
            $path="uploads/products/$imgName";
        }

        $data=$request->all();
        $data['image']=$path;
        $store=Product::create($data);
        if ($store) {
            return redirect()->route('product.index')->with('success',"Created!");
        }
        else{
            return redirect()->back()->with('error',"Try Again!");
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
        $data=Product::findOrFail($id);
        $categories=Category::all();
        $suppliers=Supplier::all();
        return view('backend.product.edit',compact('data','categories','suppliers'));
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
