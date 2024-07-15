<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Ambil pengguna yang terautentikasi
        $user = auth()->user();

        // Periksa peran pengguna dan ambil data yang sesuai
        if ($user->role == 1) {
            // Jika peran adalah admin (role 1), ambil semua data pengguna
            $data = User::all();
        } else {
            // Jika bukan admin, ambil data pengguna yang sedang login
            $data = User::where('id', $user->id)->get();
        }

        // Kembalikan view dengan data yang diambil
        return view('user.index', compact('data'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|confirmed',
            'password_confirmation' => 'required|min:5'
        ]);

        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return back()->with('success', 'data has been created');
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $data = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'nullable|min:5|confirmed',
            'password_confirmation' => 'nullable|min:5|required_with:password'
        ]);

        $user = User::findOrFail($id);

        // Jika password diisi, enkripsi dan sertakan dalam pembaruan
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            // Jika password tidak diisi, hapus dari array data
            unset($data['password']);
        }
        // Perbarui pengguna
        $user->update($data);
        return redirect()->back()->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = User::find($id)->delete();
        return back()->with('success', 'data has been deleted');
    }
}
