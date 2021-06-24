<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id')->paginate(6);
        return inertia(
            'AdminProducts', 
            [
                'products' => $products
            ]
        );
    }

    public function create()
    {
        return inertia(
            'AdminProductsAdd',
            [
                'categories' => Category::all()
            ]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'sale_price' => 'required|numeric',
            'price' => 'nullable|numeric|gt:sale_price',
            'quantity' => 'required|numeric',
            'image_path' => 'required|image|max:10240|mimes:jpg,png,JPG,PNG'
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

        if ($request->hasFile('image_path')) {
            $imageName = time().'.'.$request->image_path->extension();  
            $request->image_path->move(public_path('img'), $imageName);
            $data['image_path'] = $imageName;
        }

        Product::create($data);

        return redirect()->back();
    }
}
