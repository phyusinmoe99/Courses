@extends('layouts.adminDashbord')

@section('adminContent')

<form method="post" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col">
            
            <input type="file" name="courseImg" class="form-control">    
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="title">Course Title</label>
        <div class="col-sm-10">
            <input type="text" name="title" class="form-control">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-form-label col-sm-2" for="type">Course Type</label>
        <div class="col-sm-10">
            <select class="form-select" name="type">
                <option value="design">UI/UX</option>
                <option value="php">PHP</option>
                <option value="java">Java</option>
                <option value="javascript">Javascript</option>
              </select>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-form-label col-sm-2" for="content">Content</label>
        <div class="col-sm-10">
            <textarea name="content" class="form-control"></textarea>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-form-label col-sm-2" for="outline">Course Outline</label>
        <div class="col-sm-10">
            <textarea name="outline" class="form-control"></textarea>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="duration">Duration</label>
        <div class="col-sm-10">
            <input type="text" name="duration" class="form-control">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="timetable">Time Table</label>
        <div class="col-sm-10">
            <input type="text" name="timetable" class="form-control">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Starting Date</label>
        <div class="col-sm-10">
            <input type="text" name="startingDate" class="form-control">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="fee">Course Fee</label>
        <div class="col-sm-10">
            <input type="text" name="fee" class="form-control">
        </div>
    </div>
    <button class="btn btn-primary float-end" type="submit">Add Course</button>



</form>

    
@endsection