<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(15);
        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    public function save(ProductStoreRequest $request)
    {
        $product = Product::create([
            'name' => $request->title,
            'original_price' => $request->original_price,
            'discount_price' => $request->discount_price,
            'desc' => $request->description,
            'thumbnail' => $request->thumbnail,
            'seller_stock' => 1000,
        ]);
        return response()->json($product, Response::HTTP_CREATED);
    }
}
