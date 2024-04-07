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

    protected $fillable = ['presences_id', 'documentation', 'attendance', 'teacher_id', 'course_id'];

    public function presences(): BelongsTo
    {
        return $this->belongsTo(Presence::class, 'presences_id');
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'teacher_id')->select(['nip', 'nama']);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id')->select(['jadwal']);
    }
}
