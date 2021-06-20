<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Helpers\CartFacade as CartFacade;

class HomeController extends Controller
{
    public function index() {
        return inertia('Homepage', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'products' => Product::all(),
            'cart' => CartFacade::get()
        ]);
    }
}
