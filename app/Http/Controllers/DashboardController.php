<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //index 
    public function index(){
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalTransaksi = Order::count();

        return view('pages.dashboard', compact('totalUsers', 'totalProducts', 'totalCategories', 'totalTransaksi'));
    }
}
