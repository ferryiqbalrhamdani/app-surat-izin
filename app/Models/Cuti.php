<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cuti extends Model
{
    use HasFactory;

    protected $table = 'tb_cuti';
    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'lama_cuti',
        'keperluan_cuti',
        'keterangan_cuti',
        'status',
        'status_hrd',
    ];

   
    // public function user(): BelongsToMany
    // {
    //     return $this->belongsToMany(User::class);
    // }

    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    
}
