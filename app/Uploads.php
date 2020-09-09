<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uploads extends Model
{
    protected $fillable = [
        'file_nilai', 'file_absensi', 'file_RPP', 'guru', 'jadwal', 'pemeriksa', 'status','size_nilai','size_absensi','size_RPP'
    ];
}
