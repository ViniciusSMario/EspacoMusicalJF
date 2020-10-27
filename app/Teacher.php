<?php

namespace App;
use App\Course;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function courses()
    {
        return $this->belongsToMany(Course::class,'teacher_courses', 'teacher_id', 'course_id');
    }
}
