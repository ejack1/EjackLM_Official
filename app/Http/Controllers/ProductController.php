<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('products.index',compact('products'));
    }
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'type'=>'required',
            'startrange'=>'required',
            'endrange'=>'required',
            'maximumweight'=>'required',
            'dsetup'=>'required',
            'maximumheight'=>'required',
            'maximumwidth'=>'required',
            'maximumlength'=>'required',
            'servicetype'=>'required',
            'pickupcharge'=>'required',
            'timefrom'=>'required',
            'timeto'=>'required',
            'printer'=>'required',
            'compensation'=>'required',
            'desc'=>'required',
        ]);
        Product::create($request->all());
        return redirect()->route('products.index')->with('success','Created Successfully.');
    }

    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }


    public function update(Request $request, Product $product)
    { $request->validate([

        'type'=>'required',
        'startrange'=>'required',
        'endrange'=>'required',
        'maximumweight'=>'required',
        'dsetup'=>'required',
        'maximumheight'=>'required',
        'maximumwidth'=>'required',
        'maximumlength'=>'required',
        'servicetype'=>'required',
        'pickupcharge'=>'required',
        'timefrom'=>'required',
        'timeto'=>'required',
        'printer'=>'required',
        'compensation'=>'required',
        'desc'=>'required',
    ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success','Updated Successfully.');
    }


    public function destroy(Product $designation)
    {
        $designation->delete();
        return redirect()->route('products.index')->with('success','Country deleted successfully.');
    }
}
