<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title='All Category Info';
        $data=Category::orderBy('id','DESC')->get();
        return view('backend.category.index',compact('data','page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
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
        ]);

        $data=$request->all();
        $store=Category::create($data);
        if ($store) {
            return redirect()->route('category.index')->with('success',"Created!");
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
        $data=Category::findOrFail($id);
        if ($data) {
            return view('backend.category.edit',compact('data'));
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
        $request->validate([
            'name'=>'required|string',
        ]);

        $find=Category::findOrFail($id);
        $data=$request->all();
        $update=$find->fill($data)->save();
        if ($update) {
            return redirect()->route('category.index')->with('success',"Updated!");
        }else{
            return redirect()->back()->with('error',"Try Again!");
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
        $find=Category::findOrFail($id);
        if ($find) {
            $find->delete();
            return redirect()->back()->with('success',"Deleted!");
        }else{
            return redirect()->back()->with('error',"Try Again!");
        }
    }
}
