<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartPotensiDesa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'partpotensidesas';

    public function comment() {
        return $this->hasMany(CommentPotensiDesa::class, 'part_id');
    }
    public function partpotensidesa() {
        return $this->belongsTo(PotensiDesa::class, 'desa_id', 'id');
    }
}
