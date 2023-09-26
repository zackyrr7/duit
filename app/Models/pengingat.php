<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengingat extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'total',
        'tanggal',
        'users_id'
      
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
