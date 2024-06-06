<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'username',
        'phone',
        'password'
    ];
}