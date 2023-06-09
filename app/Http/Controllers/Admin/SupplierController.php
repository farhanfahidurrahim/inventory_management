<?php

namespace App\Http\Controllers\Admin;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title='All Suppliers Info';
        $data=Supplier::all();
        return view('backend.supplier.index',compact('data','page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $request->validate([
            'name'=>'required|string',
            'image'=>'required|image|mimes:jpg,jpeg,png,webp,max:2048',
            'email'=>'required|unique:suppliers,email',
            'phone'=>'required|unique:suppliers,phone',
            'address'=>'required',
        ]);

        if ($request->hasFile('image')) {
            $imgName=date('YmdHis').'.'.$request->file('image')->extension();
            Image::make($request->file('image'))->resize(300,300)->save(public_path('/uploads/supplier/').$imgName);
            $imgPath="uploads/supplier/$imgName";
        }

        $data=$request->all();
        $data['image']=$imgPath;
        $store=Supplier::create($data);
        if ($store) {
            return redirect()->route('supplier.index')->with('success',"Created!");
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
        $data=Supplier::FindOrFail($id);
        if ($data) {
            return view('backend.supplier.edit',compact('data'));
        }
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
        //return $request->all();
        $findid=Supplier::findOrFail($id);
        $request->validate([
            'name'=>'required|string',
            'email' => 'required|email|unique:suppliers,email,'.$id,
            'phone'=>'required|unique:suppliers,phone,'.$id,
            'address'=>'required',
        ]);

        $imgPath = $findid->image; // Default image path

        if ($request->hasFile('image')) {
            $path=public_path($findid->image);
            if (file_exists($path)) {
                unlink($path);
            }

            $imgName=date('YmdHis').'.'.$request->file('image')->extension();
            Image::make($request->file('image'))->resize(300,300)->save(public_path('/uploads/supplier/').$imgName);
            $imgPath="uploads/supplier/$imgName";
        }

        $update=$findid->update([
            'name'=>$request->name,
            'image'=>$imgPath,
            'email' =>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
        ]);

        if ($update) {
            return redirect()->route('supplier.index')->with('success',"Updated!");
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
        //return $id;
        $findid=Supplier::findOrFail($id);
        @unlink(public_path('/').$findid->image);
        $findid->delete();

        return redirect()->back()->with('error',"Deleted!");

    }
}
