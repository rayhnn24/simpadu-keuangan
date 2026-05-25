<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusMhs extends Model
{
    protected $table = 'status_mhs';

    protected $primaryKey = 'id_status';

    protected $fillable = [
        'id_mhs_ukt',
        'status',
        'keterangan'
    ];

    public function mhsUkt()
    {
        return $this->belongsTo(
            MhsUkt::class,
            'id_mhs_ukt',
            'id_mhs_ukt'
        );
    }
}