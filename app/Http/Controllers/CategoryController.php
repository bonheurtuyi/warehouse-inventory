<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

   public function __construct(){
       $this->middleware('auth');
   }

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index')
            ->with(["categories"=>$categories]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());

        session()->flash('status', 'Category added successfully!');
        return redirect()->route('categories.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        return view('admin.categories.edit')
            ->with(["category"=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, $categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $validated = $request->validated();
        $category->update($validated);

        session()->flash('status', 'Category updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $category->delete();

        session()->flash('status', 'Category deleted successfully');
        return redirect()->back();
    }
}
