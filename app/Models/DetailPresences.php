<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPresences extends Model
{
    use HasFactory;
    use SoftDeletes;

}
