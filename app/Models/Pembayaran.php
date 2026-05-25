<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'id_mhs_ukt',
        'jumlah_bayar',
        'tgl_pembayaran',
        'keterangan'
    ];

    public function mhsUkt()
    {
        return $this->belongsTo(
            MhsUkt::class,
            'id_mhs_ukt'
        );
    }
}