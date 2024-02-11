<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SnapshotTeam extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'position',
      'deskripsi',
      'images',
    ];
}
