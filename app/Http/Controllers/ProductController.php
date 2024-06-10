<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required|string',
            'qty' => 'required|numeric',
            'description' => 'nullable|string',
            'price' => 'required|decimal:0,2'
        ]);

        $createProduct = DB::table('products')->insertGetId($data);

        return redirect(route('product.index'))->with('success', 'Product created successfully');
    }

    public function edit($id)
    {
        $product = DB::table('products')->find($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string',
            'qty' => 'required|numeric',
            'description' => 'nullable|string',
            'price' => 'required|decimal:0,2',
        ]);

        $data = [
            'product_name' => $validatedData['product_name'],
            'qty' => $validatedData['qty'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
        ];

        DB::table('products')
            ->where('id', $id)
            ->update($data);

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('products')
            ->where('id', $id)
            ->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}
