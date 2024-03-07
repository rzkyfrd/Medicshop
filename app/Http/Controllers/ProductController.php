<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        $category = Category::all();
        return view('product.index', compact('product', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        $product = new Product();
        return view('product.form', compact('product', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductFormRequest $request)
    {
        $data = $request->validated();
        $image = $request->file('image');

        $fileName = time() . $image->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $fileName, 'public');
        $data["image"] = '/storage/' . $path;

        Product::create($data);
        return redirect()->route('master.product.index')->with('message', 'Product Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $category = Category::all();
        return view('product.form', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductFormRequest $request, Product $product)
    {
        $data = $request->validated();
        $image = $request->file('image');

        if($image){
            $fileName = time() . $image->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $data["image"] = '/storage/' . $path;
        }

        $product->update($data);
        return redirect()->route('master.product.index')->with('message', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
