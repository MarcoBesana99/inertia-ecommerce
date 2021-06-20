<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\CartFacade as CartFacade;

class CartController extends Controller
{
  public function addToCart($productId)
  {
    CartFacade::add(Product::where('id',$productId)->first());
    return redirect()->back();
  }
}
