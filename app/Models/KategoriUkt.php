<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriUkt extends Model
{
    protected $table = 'kategori_ukt';

    protected $primaryKey = 'id_kategori_ukt';

    protected $fillable = [
        'id_prodi',
        'kelompok_kategori',
        'nominal_ukt',
        'jenjang'
    ];
}