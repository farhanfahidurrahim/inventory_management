<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseMeta;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle="All Purchase List";
        $data=Purchase::all();
        return view('backend.purchase.index',compact('pageTitle','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers=Supplier::where('status',1)->get();
        $categories=Category::all();
        $products=Product::all();
        $units=Unit::all();
        return view('backend.purchase.create',compact('suppliers','categories','products','units'));
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
            'purchase_no' => 'required',
            'paid_amount' => 'required|numeric',
            'supplier_id' => 'required',
            'category_id' => 'required',
            'product_id' => 'required',
            'unit_id' => 'required',
            'quantity' => 'required',
            'unit_price' => 'required',
            'quantity' => 'required',
            'total_amount' => 'required',
        ]);

        $purchase=Purchase::create([
            'purchase_no' => $request->purchase_no,
            'supplier_id' => $request->supplier_id,
            'paid_amount' => $request->paid_amount,
            'total_amount' => $request->total_amount,
            'due_amount' => (int)$request->total_amount-(int)$request->paid_amount,
        ]);

        for ($i=0; $i < count($request->category_id); $i++) {
            PurchaseMeta::create([
                'purchase_id'=>$purchase->id,
                'category_id'=>$request->category_id[$i],
                'product_id'=>$request->product_id[$i],
                'quantity'=>$request->quantity[$i],
                'unit_price'=>$request->unit_price[$i],
                'unit_id'=>$request->unit_id[$i],
            ]);
        }

        return redirect()->route('purchase.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle="View Purchase";
        $data=Purchase::findOrFail($id);
        $suppliers=Supplier::all();
        $categories=Category::all();
        $units=Unit::all();
        return view('backend.purchase.show',compact('pageTitle','data','suppliers','categories','units'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    public function getProduct($id)
    {
        $products=Product::where('category_id',$id)->get();
        // return $products;
        return response()->json($products);
    }
}
