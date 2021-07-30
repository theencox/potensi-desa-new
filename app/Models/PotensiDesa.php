<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotensiDesa extends Model
{
    protected $fillable = ['nama', 'deskripsi', 'gambar1', 'gambar2', 'gambar3'];
    use HasFactory;

    public function partpotensidesa() {
        return $this->hasMany(PartPotensiDesa::class, 'desa_id');
    }
}
