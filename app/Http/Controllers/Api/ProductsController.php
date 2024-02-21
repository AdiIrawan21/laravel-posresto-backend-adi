<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    //index api
    public function index()
    {
        //get all products
        $products = Product::all();
        //load category
        $products->load('category');
        //$products = Product::paginate(10);
        return response()->json([
            'status' => 'success',
            'data' => $products
        ], 200);
    }
}
