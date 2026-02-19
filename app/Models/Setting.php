<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    // Tambahkan ini agar data bisa disimpan secara Mass Assignment
    protected $fillable = ['key', 'value'];
}