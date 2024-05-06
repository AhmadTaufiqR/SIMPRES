<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Teacher;
use App\Models\Course;
use App\Models\Room;
use App\Models\Generation;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{

    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teachers_id'); 
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'courses_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'rooms_id');
    }

    public function generation()
    {
        return $this->belongsTo(Generation::class, 'generations_id');
    }
}


