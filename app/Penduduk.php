<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'penduduk';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
