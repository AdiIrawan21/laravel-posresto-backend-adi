<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //index 
    public function index(){
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalCategories = Category::count();

        return view('pages.dashboard', compact('totalUsers', 'totalProducts', 'totalCategories'));
    }
}
