<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\AddCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\categories;
use App\Models\products;

class categoryController extends Controller
{
    public function index()
    {
        $categories = categories::orderBy('id', 'desc')->paginate(5);
        return view('pages.category.index', compact('categories'));
    }


    public function create()
    {
        return view('pages.category.create');
    }

    public function store(AddCategoryRequest $request)
    {
        try {
            categories::create($request->all());
            return redirect()->route('category.index')->with('success', 'Insert data successfully !');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $cat = categories::find($id);
        $product = products::find($id);
        return view('pages.category.edit', compact('cat', 'product'));
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        try {
            categories::find($id)->update($request->all());
            return redirect()->route('category.index')->with('success', 'Update Data Successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            categories::find($id)->delete();
            return redirect()->route('category.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
