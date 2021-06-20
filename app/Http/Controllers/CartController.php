<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Helpers\CartFacade as CartFacade;

class CartController extends Controller
{
  public function index()
  {
    return inertia('Cart');
  }

  public function addToCart($productId)
  {
    CartFacade::add(Product::where('id',$productId)->first());
    return redirect()->back();
  }
}
