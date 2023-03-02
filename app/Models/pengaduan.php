<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengaduan extends Model
{
    use HasFactory;
    protected $table= 'pengaduan';
    protected $fillable = [
        'tgl_pengaduan',
        'isi_laporan',
        'foto',
        'level',

    ];

}
