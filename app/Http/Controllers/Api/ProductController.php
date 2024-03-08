<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\CreateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(CreateProductRequest $request){
        $newProduct = Product::create([
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price,
            'product' => $request->product,
        ]);
        return redirect(route('product.index'));
    }
}
