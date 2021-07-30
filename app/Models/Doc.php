<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    protected $fillable = ['judul', 'deskripsi', 'gambar'];
    use HasFactory;
}