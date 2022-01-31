<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WebHomeController extends Controller
{

    public function index()
    {
        $products = Product::with('product_galleries','product_classifications','sub_category')->get();
        return view('web.home', compact('products'));
    }

    public function productDetails($id)
    {
        // TODO: Implement categoryDetails() method.
        $product = Product::with('product_galleries','product_classifications','sub_category')->find($id);
        return response()->json($product);
    }
}
