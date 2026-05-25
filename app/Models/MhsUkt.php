<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BeasiswaMhs;

class MhsUkt extends Model
{
    protected $table = 'mhs_ukt';

    protected $primaryKey = 'id_mhs_ukt';

    protected $fillable = [
        'nim',
        'id_kategori_ukt',
        'semester',
        'tahun_akademik',
        'status_pembayaran',
        'total_tagihan'
    ];

    public function kategori()
    {
        return $this->belongsTo(
            KategoriUkt::class,
            'id_kategori_ukt'
        );
    }

    public function pembayaran()
    {
        return $this->hasMany(
            Pembayaran::class,
            'id_mhs_ukt'
        );
    }

    public function status()
    {
        return $this->hasMany(
            StatusMhs::class,
            'id_mhs_ukt'
        );
    }
    public function beasiswaMhs()
    {
        return $this->hasOne(
            BeasiswaMhs::class,
            'nim',
            'nim'
        );
    }
}