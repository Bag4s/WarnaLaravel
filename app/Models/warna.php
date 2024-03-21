<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class warna extends Model
{
    use HasFactory;
    protected $fillable =['kode_warna','nama_warna','deskripsi','nilai_rgb','nilai_hex'];
}