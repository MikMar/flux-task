@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="/home/save-course" method="post">
                <div class="form-group">
                    <label for="course-title">Course title</label>
                    <input name="title" type="text" class="form-control" id="course-title"{{isset($course) ? ' value=' . $course->title : ''}}>
                </div>
                <div class="form-group">
                    <label for="teacher-select">Select teacher</label>
                    <select name="teacher_id" class="form-control" id="teacher-select">
                        @foreach($teachers as $teacher)
                            <option value="{{$teacher->id}}"{{isset($course) && $course->teacher_id == $teacher->id ? ' selected=selected' : ''}}>{{$teacher->name_surname}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    @foreach(config('week.days') as $day)
                        <div class="col-12">
                            <label>Week Day : {{$day}} </label>
                            <input name="week_days[{{$day}}][start]" type="text" class="form-control time-input" id="course-title" placeholder="Start time"{{isset($schedules) && isset($schedules[$day]) ? ' value=' . $schedules[$day]['start'] : ''}}> -
                            <input name="week_days[{{$day}}][end]" type="text" class="form-control time-input" id="course-title" placeholder="End time"{{isset($schedules) && isset($schedules[$day]) ? ' value=' . $schedules[$day]['end'] : ''}}>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
                {{csrf_field()}}
                @if(isset($course))
                    <input name="course_id" type="hidden" value="{{$course->id}}">
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
