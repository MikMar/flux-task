@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Courses
                    <a href="/home/add-course">
                        <div class="btn btn-info" id="btn-add-course">Add +</div>
                    </a>
                </div>

                <div class="card-body">

                    <ul class="list-group">
                        @foreach($courses as $course)
                            <li class="list-group-item">
                                {{$course->title}}
                                <a href="/home/edit-course/{{$course->id}}"><i class="fas fa-edit right-icon"></i></a>
                                <a href="/home/delete-course/{{$course->id}}" class="delete-course-link "><i class="far fa-trash-alt right-icon"></i></a>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
