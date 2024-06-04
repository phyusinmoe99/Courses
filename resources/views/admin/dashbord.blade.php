@extends('layouts.adminDashbord')

@section('adminContent')
<div class="container">
    @if(session('info'))
    <div class="alert alert-info">
        {{session('info')}}
    </div>
    @endif
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Starting Date</th>
            <th>Action</th>
        </tr>
        @foreach ($courses as $course )
    
        <tr>
            <td>{{$course->id}}</td>
            <td>{{$course->title}}</td>
            <td>{{$course->starting_date}}</td>
            <td>
                <a class="btn btn-danger" href="{{url("/admin/delete/$course->id")}}">Delete</a>
                <a class="btn btn-warning" href="#">Edit</a>
    
            </td>
        </tr>
            
        @endforeach
    </table

</div>



    
@endsection