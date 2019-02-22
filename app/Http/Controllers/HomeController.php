<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Course;
use App\Models\Schedule;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function courses()
    {
        $courses = Course::all();

        return view('courses')->with([
            'courses' => $courses
        ]);
    }

    public function addCourse()
    {
        $teachers = Teacher::all();

        return view('edit-course')->with([
            'teachers' => $teachers
        ]);
    }

    public function editCourse($courseId)
    {
        $course = Course::with('schedules')
            ->find($courseId);
        $schedules = $course->schedules->keyBy('week_day');
        $teachers = Teacher::all();

        return view('edit-course')->with([
            'course' => $course,
            'teachers' => $teachers,
            'schedules' => $schedules
        ]);
    }

    public function saveCourse(Request $request)
    {
        $data = $request->all();

        if (isset($data['course_id'])) {
            $course = Course::findOrFail($data['course_id']);
        } else {
            $course = new Course();
        }

        $course->title = $data['title'];
        $course->teacher_id = $data['teacher_id'];

        $schedules = [];
        foreach ($data['week_days'] as $day => $dayData) {

            if (!empty($dayData['start'] && !empty($dayData['end']))) {

                $dayData['week_day'] = $day; // for fillable
                $schedules []= new Schedule($dayData);

            }

        }

        DB::transaction(function () use($course, $schedules) {

            $course->save();
            $course->schedules()->delete();
            $course->schedules()->saveMany($schedules);

        });

        return redirect('home/courses');
    }

    public function deleteCourse($courseId)
    {
        $course = Course::find($courseId);
        DB::transaction(function () use($course) {
            $course->students()->detach();
            $course->schedules()->delete();
            $course->delete();
        });

        return response([], 200); // OK
    }
}
