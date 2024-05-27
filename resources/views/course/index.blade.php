@extends('layouts.app')

@section('content')
    <div class="container">

      <div class="row mb-4">
        <div class="col">
          <a href="{{url("/courses?title=all")}}" class="btn btn-outline-info me-4">All</a>
          <a href="{{url("/courses?title=php")}}" class="btn btn-outline-info me-4">PHP</a>
          <a href="{{url("/courses?title=java")}}" class="btn btn-outline-info me-4">Java</a>
          <a href="{{url("/courses?title=javascript")}}" class="btn btn-outline-info me-4">JavaScript</a>
          <a href="{{url("/courses?title=design")}}" class="btn btn-outline-info me-4">UIUX</a>

        </div>
        
      </div>
        
       <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ( $courses as $course )
        <div class="col">
          <div class="card h-100">
            <img src='{{asset("storage/$course->image_path")}}' class="card-img-top h-50" alt="course-image" >
            <h5 class="card-header  fs-5 fw-bold text-light">{{$course->title}}</h5>
            <div class="card-body">
              
              <ul class="list-group">
                <li class="list-group-item list-group-item-primary fs-5  text-light">
                  <div class="row">
                    <div class="col">Starting Date :</div>
                    <div class="col">{{$course->starting_date}}</div>
                  </div>
                </li>
                <li class="list-group-item list-group-item-primary fs-5 text-light">
                  <div class="row">
                    <div class="col">Duration :</div>
                    <div class="col">{{$course->duration}}</div>
                  </div>
                </li>
                <li class="list-group-item list-group-item-primary fs-5 text-light">
                  <div class="row">
                    <div class="col">Time Table :</div>
                    <div class="col">{{$course->timetable}}</div>
                  </div>
                </li>
                <li class="list-group-item list-group-item-primary fs-5 text-light">
                  <div class="row">
                    <div class="col">Course Fee :</div>
                    <div class="col">{{$course->fee}}</div>
                  </div>
                </li>
                
                
              </ul>
            </div>
            <a class="card-footer border-primary btn btn-outline-info fs-6 m-2" href="{{url("/courses/detail/$course->id")}}">View Detail</a>
          </div>
        </div>
        @endforeach
        
       </div>
        
        
    </div>
@endsection