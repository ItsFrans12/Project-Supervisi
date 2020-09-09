<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
     protected $fillable = [
        'file_nilai', 'file_absensi', 'file_RPP','guru'
    ];
}
