<?php

namespace App\Http\Controllers;

use App\Models\Category;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Unit;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index')
            ->with(["products"=> $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $units = Unit::all();

        return view('admin.products.create')
            ->with(["categories"=>$categories, "units"=>$units]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->storeAs('uploads/products', $imageName);
        $validated['image'] = $imageName;
        $validated['inQty'] = $request->input('quantity');

        Product::create($validated);

        session()->flash('status', 'Product added successfully!');
        return redirect()->route('products.index');
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
    public function edit($productId)
    {
        $product = Product::find($productId);
        $units = Unit::all();
        $categories = Category::all();
        return view('admin.products.edit')
            ->with(["product"=>$product, "units"=>$units, "categories"=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $validated = $request->validated();
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('uploads/products', $imageName);
            $validated['image'] = $imageName;

        }
        $validated['inQty'] = $request->input('quantity');

        $product->update($validated);

        session()->flash('status', 'Product updated successfully');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($productId)
    {
        $product = Product::findOrFail($productId);
        $product->delete();

        session()->flash('status', 'Product deleted successfully');
        return redirect()->back();
    }
}
