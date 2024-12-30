<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa = Siswa::count();
        $pay = Payment::where('status', 'Berhasil')->sum('nominal');
        $tagihan = Payment::where('status', 'Menunggu Pembayaran')->sum('nominal');
        return view('Resources.dashboard', compact('siswa', 'pay', 'tagihan'));
    }
}
