<?php

namespace App\Http\Controllers;

use App\Http\Requests\product\AddProductRequest;
use App\Models\categories;
use App\Models\products;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index()
    {
        $products = products::orderBy('id', 'desc')->paginate(5);
        return view('pages.admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = categories::all();
        return view('pages.admin.product.create', compact('categories'));
    }

    public function store(AddProductRequest $request)
    {
        $fileName = time() . $request->image->getClientOriginalName();
        $request->image->move(public_path('uploads/products'), $fileName);

        products::create([
            'name' => $request->name,
            'image' => $fileName,
            'price' => $request->price,
            'discount' => $request->discount,
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.product.index')->with('success', 'Create Success')->with('success', 'Insert data successfully !');
    }

    public function show($id)
    {
        dd($id);
    }

    public function edit($id)
    {
        $categories = categories::all();
        $product = products::find($id);
        return view('pages.admin.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = products::find($id);
        if ($request->has('image')) {
            $fileName = time() . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/products'), $fileName);
        } else {
            $fileName = $product->image;
        }
        try {
            products::find($id)->update([
                'name' => $request->name,
                'image' => $fileName,
                'price' => $request->price,
                'discount' => $request->discount,
                'category_id' => $request->category_id,
            ]);

            return redirect()->route('admin.product.index')->with('success', 'Update Success')->with('success', 'Update Data Successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            products::find($id)->delete();
            return redirect()->route('admin.product.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
