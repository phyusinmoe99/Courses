@extends('layouts.adminDashbord')

@section('adminContent')
@if ($errors->any())
       <div class="alert alert-warning">
           @foreach ($errors->all() as $err )
            {{ $err }}
           @endforeach
        </div>      
    @endif

<form method="post" class="mb-4" action="{{url("/admin/student-list")}}">
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <input placeholder="Search...." type="text" name="search" class="form-control" value="{{request()->input('search')}}">
        </div>
        <div class="col-sm-4">
            {{-- <select name="searchBy" class="form-select" >
                <option value="user_name" {{ $oldInput['searchBy'] && $oldInput['searchBy']== "user_name" ? 'selected' : '' ?? ''}}>Student Name</option>
                <option value="user_id" {{ $oldInput['searchBy'] && $oldInput['searchBy']== "user_id" ? 'selected' : '' ?? ''}}>Student Id</option>
                <option value="course_name" {{ $oldInput['searchBy'] && $oldInput['searchBy']== "course_name" ? 'selected' : '' ?? ''}}>Course Name</option>
            </select> --}}
            <select name="searchBy" class="form-select" >
                <option value="user_name" {{request()->input('searchBy') == 'user_name' ? 'selected' : ''}} >Student Name</option>
                <option value="user_id" {{request()->input('searchBy')=='user_id' ? 'selected' : ''}}>Student Id</option>
                <option value="course_name" {{request()->input('searchBy')=='course_name' ? 'selected' : ''}} >Course Name</option>
            </select>

        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary form-control">Search</button>
        </div>

    </div>
   
</form>

@if (!blank($enrolledData))
<table class="table">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Course</th>
        <th>Payment</th>
        <th>Enrolled Date</th>
    </tr>

    
    @foreach ($enrolledData as $enroll )
    <tr>
        <td>{{$enroll->user_id}}</td>
        <td>{{$enroll->user->name}}</td>
        <td>{{$enroll->user->email}}</td>
        <td>{{$enroll->phone_number}}</td>
        <td>{{$enroll->course->title}}</td>
        <td>{{$enroll->payment_validator ? 'Success' : 'Pending'}}</td>
        <td>{{$enroll->created_at}}</td>

    </tr>

   
    @endforeach
    @else
    <div class="alert alert-info">There is no search value!!</div>
        
    @endif
   

</table>
  
    

@endsection