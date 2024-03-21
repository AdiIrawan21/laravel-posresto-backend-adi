<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
{
    $query = Order::query(); // Mulai dengan membangun kueri Eloquent dari model Product

    // Tambahkan filter pencarian jika ada
    if ($request->has('search')) {
        $query->where('nama_kasir', 'like', '%' . $request->search . '%');
    }

    // Dapatkan produk berdasarkan kueri yang telah dibangun
    $reports = $query->paginate(10);

    // Kirimkan data ke view
    return view('pages.reports.index', compact('reports'));
}

}
