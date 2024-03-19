<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Headmaster extends Model
{
    use HasFactory;

    protected $table = 'headmasters';
    protected $fillable = [
        'nip',
        'name',
        'username',
        'password',
        'phone',
        'address'
    ];

    use SoftDeletes;
}
