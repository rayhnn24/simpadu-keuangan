<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Beasiswa;

class BeasiswaMhs extends Model
{
    protected $table = 'beasiswa_mhs';

    protected $primaryKey = 'id_beasiswa_mhs';

    protected $fillable = [
        'nim',
        'id_beasiswa',
        'keterangan'
    ];
    public function beasiswa()
    {
        return $this->belongsTo(
            Beasiswa::class,
            'id_beasiswa',
            'id_beasiswa'
        );
    }
}