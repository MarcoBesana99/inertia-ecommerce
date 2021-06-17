<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index() {
        return inertia('AdminProducts');
    }

    public function create() {
        return inertia('AdminProductsAdd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'category_id' => ['required'],
            'sale_price' => ['required'],
            'quantity' => ['required'],
        ]);

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'quantity' => $request->quantity,
        ];

        Product::create($data);

        return Redirect::route('admin.products');
    }
}
