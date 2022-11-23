<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kampus extends Model
{
    use HasFactory;
    protected $table = 'kampus';
    protected $fillable =
    [
        'code_kampus',
        'nama_kampus',
        'alamat_kampus',
        'created_at',
        'updated_at'

    ];
}
