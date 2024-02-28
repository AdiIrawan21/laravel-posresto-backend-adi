<?php

namespace App\Http\Controllers\Api;

use App\Models\Discount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscountController extends Controller
{
    // get data discount
    public function index(){
        $discount = Discount::all();
        
        return response()->json([
            'status' => 'success',
            'data' => $discount
        ], 200);
    }
}
