<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstra extends Model
{
    use HasFactory;
    protected $fillable = ['nama_singkat', 'nama_panjang', 'images', 'deskripsi'];
}
