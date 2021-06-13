<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function home()
    {          
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);
        Product::create($request->all());
        return redirect('/products');
    }

    public function viewProduct()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('edit', compact('product', 'categories'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|min:3|max:20',
            'price' => 'required',
            'stock' => 'required'
        ]);
        Product::findOrFail($id)->update($request->all());
        return redirect('/products');
    }

    public function delete($id)
    {
        Product::destroy($id);
        return back();
    }
}
