<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_ref',
        'nominal',
        'status',
        'id_siswa',
        'tanggal_tagihan',
        'tanggal_pembayaran',
    ];
    public function idSiswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
}
