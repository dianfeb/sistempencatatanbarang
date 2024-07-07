<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $clasifications = ['Baik', 'Rusak Ringan', 'Rusak Berat'];
        $data = [];
    
        foreach ($clasifications as $clasification) {
            $totalQuantity = Product::whereHas('clasification', function ($query) use ($clasification) {
                $query->where('name', $clasification);
            })->sum('quantity');
            
            $data[] = [
                'name' => $clasification,
                'totalQuantity' => $totalQuantity,
                'bgColor' => $clasification === 'Baik' ? 'bg-success' : ($clasification === 'Rusak Ringan' ? 'bg-warning' : 'bg-danger')
            ];
        }
        return view('dashboard', compact('data'));
    }
}
