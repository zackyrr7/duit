<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $fillabel = [
        'nama',
        'status',
        'total',
        'tanggal',
        'users_id',
        'kategoris_id',
        'bulans_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }

    public function bulan()
    {
        return $this->belongsTo(Bulan::class);
    }
}
