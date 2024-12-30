<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'nama',
        'kelas',
        'tmp_lahir',
        'tgl_lahir',
        'gender',
        'id_user',
    ];

    public function idUser()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
