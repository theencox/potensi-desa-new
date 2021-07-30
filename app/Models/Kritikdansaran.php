<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kritikdansaran extends Model
{
    protected $fillable = ['nama', 'alamat', 'email', 'nomorhp', 'deskripsi'];
    use HasFactory;
}
