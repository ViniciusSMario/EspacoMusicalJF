<?php

namespace App;
use App\Teacher;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class,'teacher_courses', 'course_id', 'teacher_id')
        ->withPivot('course_id', 'teacher_id');
    }
}
