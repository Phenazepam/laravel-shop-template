<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\http\Requests\Category\UpdateRequest;
use App\Http\Requests\Category\StoreRequest as StoreRequest;

class CategoryController extends Controller
{
    public function Index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function Create()
    {
        return view('category.create');
    }

    public function Store(StoreRequest $request)
    {
        $data = $request->validated();
        Category::firstOrCreate($data);
        return redirect()->route('category.index');
    }

    public function Edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function Show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    public function Update(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        return view('category.show', compact('category'));
    }

    public function Delete(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}
