@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="list-group">
                <a href="{{url('/admin/dashbord')}}" class="list-group-item">Courses</a>
                <a href="{{url('/admin/add')}}" class="list-group-item">Create New Course</a>
                <a href="{{url('/admin/student-list')}}" class="list-group-item">Students List</a>
                <a href="{{url('/admin/new-enrollment')}}" class="list-group-item">New Enrollment</a>
            </div>
    
        </div>
        <div class="col-md-10">
            @yield('adminContent')
    
        </div>

    </div>
   
</div>

    
@endsection

