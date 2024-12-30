<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Payment;
use App\Mail\PaymentInvoice;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function index()
    {
        $data = Payment::all();
        $siswa = Siswa::all();
        return view('Resources.components.payment', compact('data', 'siswa'));
    }
    public function indexUser()
    {
        $user = auth()->user();
        $siswa = Siswa::where('id_user', $user->id)->first();
        $data = Payment::where('id_siswa', $siswa->id)->get();
        return view('Resources.components.payment-user', compact('data'));
    }

    public function post(Request $request)
    {
        try {
            Payment::create([
                'no_ref' => $request->no_ref,
                'id_siswa' => $request->id_siswa,
                'nominal' => $request->nominal,
                'tanggal_tagihan' => $request->tanggal_tagihan,
            ]);
            return redirect('payment')->with('success', 'Data pembayaran berhasil ditambahkan.');
        } catch (\Throwable $th) {
            return redirect('payment')->with('error', 'Data pembayaran gagal ditambahkan.');
        }
    }

    public function delete($id)
    {
        Payment::find($id)->delete();
        return redirect('payment')->with('success', 'Data pembayaran berhasil dihapus.');
    }

    public function approve($id)
    {
        $pay = Payment::find($id);
        $pay->update([
            'status' => 'Berhasil',
            'tanggal_pembayaran' => Carbon::now(),
        ]);
        $currentYear = Carbon::parse($pay->tanggal_tagihan)->year;
        $newYear = $currentYear + 1;
        $newRandomNumber = str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
        $newNoRef = preg_replace('/\d{4}-\d{3}/', $newYear . '-' . $newRandomNumber, $pay->no_ref, 1);
        Payment::create([
            'no_ref' => $newNoRef,
            'id_siswa' => $pay->id_siswa,
            'nominal' => $pay->nominal,
            'tanggal_tagihan' => Carbon::parse($pay->tanggal_tagihan)->addYear(),
        ]);
        return redirect('payment')->with('success', 'Data pembayaran berhasil diupdate.');
    }

    public function invoice($id)
    {
        $payment = Payment::find($id);

        if (!$payment) {
            return redirect()->route('payment')->with('error', 'Payment not found!');
        }
        $data = [
            'no_ref' => $payment->no_ref,
            'nama' => $payment->idSiswa->nama,
            'nis' => $payment->idSiswa->nis,
            'kelas' => $payment->idSiswa->kelas,
            'nominal' => number_format($payment->nominal, 0, ',', '.'),
            'status' => $payment->status,
            'tanggal_tagihan' => \Carbon\Carbon::parse($payment->tanggal_tagihan)->format('d-m-Y'),
            'tanggal_pembayaran' => \Carbon\Carbon::parse($payment->tanggal_pembayaran)->format('d-m-Y'),
        ];
        $pdf = PDF::loadView('Resources.layouts.invoice', $data);
        return $pdf->download('invoice_' . $payment->no_ref . '.pdf');
    }

    public function sendMail($id)
    {
        $payment = Payment::find($id);

        if (!$payment) {
            return redirect()->route('payment')->with('error', 'Payment not found!');
        }
        $siswa = Siswa::where('id', $payment->id_siswa)->first();

        if (!$siswa) {
            return redirect()->route('payment')->with('error', 'Siswa not found!');
        }
        $user = User::where('id', $siswa->id_user)->first();

        if (!$user) {
            return redirect()->route('payment')->with('error', 'User not found!');
        }
        Mail::to($user->email)->send(new PaymentInvoice($payment));
        return redirect()->route('payment')->with('success', 'Email berhasil dikirim.');
    }
}
