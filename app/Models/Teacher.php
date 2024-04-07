<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nip', 'name', 'email', 'password', 'address', 'gender', 'phone'];

    // Definisikan relasi detail presensi
    public function detailPresensi()
    {
        return $this->hasMany(DetailPresences::class);
    }
}
