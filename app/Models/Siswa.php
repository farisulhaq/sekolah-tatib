<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nama', 'nis', 'alamat', 'tanggal_lahir', 'jenis_kelamin_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
