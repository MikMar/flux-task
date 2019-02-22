<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = [
        'title',
        'teacher_id'
    ];

    protected $attributes = [

    ];

    protected $defaultColumns = [
        'id',
        'title'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'id', 'teacher_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'rf_students_courses');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'course_id', 'id');
    }
}
