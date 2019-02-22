<?php

namespace App\Http\Controllers;

use App\Models\Course;

class IndexController extends Controller
{
    public function courses()
    {
        $courses = Course::all();

        return view('course.all')->with([
            'courses' => $courses
        ]);
    }

    public function course($courseId)
    {
        $course = Course::with('teacher', 'students', 'schedules')
            ->find($courseId);

        return view('course.index')->with([
            'course' => $course
        ]);
    }
}
