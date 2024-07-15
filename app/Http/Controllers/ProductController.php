<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Clasification;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Cache;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $room = Room::latest()->get();
        $clasification = Clasification::latest()->get();
        $data = Product::with('Room', 'Clasification')->latest()->get();
        return view('product.index', compact('data', 'room', 'clasification'));
    }

    public function generatePDF()
    {
        $products = Product::with('Room', 'Clasification')->latest()->get();

        $data = [
            'title' => 'Product List',
            'date' => date('m/d/Y'),
            'products' => $products
        ];
    
        $pdf = Cache::remember('products.pdf', 60, function() use ($data) {
            return Pdf::loadView('product.printPDF', $data)->output();
        });
    
        return response()->streamDownload(
            fn() => print($pdf),
            'products.pdf'
        );
    }

  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'room_id' => 'required',
            'clasification_id' => 'required',
            'name' =>'required',
            'quantity' => 'required',
            'desc' => 'required',
        ]);

        Product::create($data);
        return back()->with('success', 'data has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $data = $request->validate([
            'room_id' => 'nullable',
            'clasification_id' => 'nullable',
            'name' =>'nullable',
            'quantity' => 'nullable',
            'desc' => 'nullable',
        ]);

        Product::find($id)->update($data);
        return back()->with('success', 'data has been update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Product::find($id)->delete();
        return back()->with('success', 'data has been deleted');
    }
}
