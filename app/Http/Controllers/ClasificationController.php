<?php

namespace App\Http\Controllers;

use App\Models\Clasification;
use Illuminate\Http\Request;

class ClasificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Clasification::latest()->get();
        return view('clasification.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $data = $request->validate([
            'name' => 'required|min:3'
        ]);

        Clasification::create($data);
        return back()->with('success', 'data has been created');

    }

   


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $data = $request->validate([
            'name' => 'required|min:3'
        ]);

        Clasification::find($id)->update($data);
        return back()->with('success', 'data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Clasification::find($id)->delete();
        return back()->with('success', 'data has been delete');
    }
}
