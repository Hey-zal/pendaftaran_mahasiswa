<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable =
    [
        'email',
        'nama_lengkap',
        'jenis_kelamin',
        'tanggal_lahir',
        'agama',
        'alamat',
        'code_programstudi',
        'pendidikan_terakhir',
        'code_kampus',
        'upload_ktp',
        'upload_ijazah',    
        'created_at',
        'updated_at'

    ];
}
