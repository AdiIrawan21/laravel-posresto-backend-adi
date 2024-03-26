<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::query(); // Mulai dengan membangun kueri Eloquent dari model Order
    
        // Tambahkan filter pencarian berdasarkan transaction_time jika ada
        if ($request->has('search')) {
            // Asumsi format tanggal yang dikirimkan adalah Y-m-d, sesuaikan jika berbeda
            $searchDate = $request->search;
            $query->whereDate('transaction_time', '=', $searchDate);
        }
    
        // Urutkan data dari yang terbaru ke yang terlama berdasarkan id
        $query->orderBy('id', 'desc');
    
        // Dapatkan order berdasarkan kueri yang telah dibangun
        $reports = $query->paginate(10);
    
        // Kirimkan data ke view
        return view('pages.reports.index', compact('reports'));
    }
    

}
