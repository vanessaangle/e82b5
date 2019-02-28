<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'penduduk';

    protected $fillable = [
        'kk',
        'nik',
        'nama',
        'alamat',
        'tgl_lahir',
        'agama',
        'golongan_darah',
        'pekerjaan',
        'file_ktp',
        'file_kk',
        'file_akta',
        'rastra',
        'pakaian',
        'kesehatan',
        'tempat_tinggal',
        'pendidikan',
        'status',
        'desa_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
