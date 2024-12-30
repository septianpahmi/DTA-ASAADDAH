<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('Resources.components.users', compact('data'));
    }


    public function post(Request $request)
    {
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'role' => $request->role,
            ]);
            return redirect('users')->with('success', 'Users berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect('users')->with('error', 'Nomor telepon atau email sudah terdaftar.');
        }
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect('users')->with('success', 'Users berhasil di hapus');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'role' => $request->role,
            ]);
            return redirect('users')->with('success', 'Users berhasil di update');
        } catch (\Throwable $th) {
            return redirect('users')->with('error', 'Nomor telepon atau email sudah digunakan.');
        }
    }
}
