<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Web extends Model
{
    protected $table = 'web';

    protected $fillable = [
        'gambar_depan',
        'tentang',
        'telepon',
        'email',
        'alamat'
    ];
}
