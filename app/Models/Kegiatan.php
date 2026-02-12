<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    // Tambahkan baris ini untuk "membuka kunci" kolom di database
    protected $fillable = [
        'judul', 
        'foto', 
        'deskripsi'
    ];
}