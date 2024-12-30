<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::all();
        $ortu = User::where('role', 'Orang Tua')->get();
        return view('Resources.components.siswa', compact('data', 'ortu'));
    }

    public function post(Request $request)
    {
        try {
            Siswa::create([
                'nis' => $request->nis,
                'nama' => $request->nama,
                'kelas' => $request->kelas,
                'tmp_lahir' => $request->tmp_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'gender' => $request->gender,
                'id_user' => $request->id_user,
            ]);
            return redirect('siswa')->with('success', 'Siswa berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect('siswa')->with('error', 'Gagal menambahkan siswa.');
        }
    }

    public function delete($id)
    {
        Siswa::find($id)->delete();
        return redirect('siswa')->with('success', 'Siswa berhasil di hapus');
    }

    public function update(Request $request, $id)
    {
        $user = Siswa::find($id);
        try {
            $user->update([
                'nis' => $request->nis,
                'nama' => $request->nama,
                'kelas' => $request->kelas,
                'tmp_lahir' => $request->tmp_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'gender' => $request->gender,
                'id_user' => $request->id_user,
            ]);
            return redirect('siswa')->with('success', 'Data Siswa berhasil di update');
        } catch (\Throwable $th) {
            return redirect('siswa')->with('error', 'Data Siswa gagal di update.');
        }
    }
}
