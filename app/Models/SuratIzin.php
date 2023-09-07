<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratIzin extends Model
{
    use HasFactory;
    protected $table = 'tb_izin_meninggalkan_kantor';

    protected $fillable = [
        'nama_pt',
        'nama_user',
        'username_user',
        'divisi_user',
        'tanggal_user',
        'tanggal_izin',
        'keterangan_izin',
        'jam_mulai',
        'jam_akhir',
        'status',
        'status_hrd',
        'role_id',
        'keperluan_izin',
    ];
}
