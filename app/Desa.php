<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 'desa';

    protected $fillable = [
        'nama_desa',
        'status_desa',
        'lat',
        'long'
    ];

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class);
    }
}
