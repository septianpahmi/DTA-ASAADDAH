<?php

namespace App\Mail;

use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentInvoice extends Mailable
{
    use Queueable, SerializesModels;
    public $payment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }

    // public function build()
    // {
    //     return $this->subject('Informasi Tagihan' . $this->payment->no_ref)
    //         ->view('Resources.layouts.email')  // View HTML yang akan digunakan
    //         ->with([
    //             'payment' => $this->payment,
    //             'no_ref' => $this->payment->no_ref,
    //             'nis' => $this->payment->idSiswa->nis,
    //             'nama' => $this->payment->idSiswa->nama,
    //             'kelas' => $this->payment->idSiswa->kelas,
    //             'nominal' => number_format($this->payment->nominal, 0, ',', '.'),
    //             'tanggal_tagihan' => \Carbon\Carbon::parse($this->payment->tanggal_tagihan)->format('d-m-Y'),
    //         ]);
    // }
    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Informasi Tagihan' . ' ' . $this->payment->no_ref,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'Resources.layouts.email',
            with: [
                'payment' => $this->payment,
                'no_ref' => $this->payment->no_ref,
                'nis' => $this->payment->idSiswa->nis,
                'nama' => $this->payment->idSiswa->nama,
                'kelas' => $this->payment->idSiswa->kelas,
                'nominal' => number_format($this->payment->nominal, 0, ',', '.'),
                'tanggal_tagihan' => \Carbon\Carbon::parse($this->payment->tanggal_tagihan)->format('d-m-Y'),
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
