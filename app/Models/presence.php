<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Teacher;
use App\Models\Course;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class Presence extends Model
{
    use HasFactory;
    use SoftDeletes;
}
