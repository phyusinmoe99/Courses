@extends('layouts.adminDashbord')

@section('adminContent')

@if ($errors->any())
       <div class="alert alert-warning">
           @foreach ($errors->all() as $err )
            {{ $err }}
           @endforeach
        </div>      
    @endif

<form method="post" enctype="multipart/form-data" class="mx-2">
    @csrf
    
    <div class="row mb-3">
        <div class="col">
           <img src="#" alt="New Course" id="imgPreview" style="display: none; width:100%">       
         </div>
    </div>
    <div class="row mb-3">
       
            <label class="col-sm-2 col-form-label" for="title">Choose Upload Photo</label>
            <div class="col-sm-10">
                <input type="file" name="courseImg" class="form-control" onchange="previewImage(event)">
            </div>
               
        
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="title">Course Title</label>
        <div class="col-sm-10">
            <input type="text" name="title" class="form-control" value="{{old('title')}}">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-form-label col-sm-2" for="type">Course Type</label>
        <div class="col-sm-10">
            <select class="form-select" name="type">
                <option value="design" {{old('type') == 'design' ? 'selected' : ''}}>UI/UX</option>
                <option value="php" {{old('type') == 'php' ? 'selected' : ''}}>PHP</option>
                <option value="java" {{old('type') == 'java' ? 'selected' : ''}}>Java</option>
                <option value="javascript" {{old('type') == 'javascript' ? 'selected' : ''}}>Javascript</option>
              </select>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-form-label col-sm-2" for="content">Content</label>
        <div class="col-sm-10">
            <textarea name="content" class="form-control" >{{old('content')}}</textarea>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-form-label col-sm-2" for="outline">Course Outline</label>
        <div class="col-sm-10">
            <textarea name="outline" class="form-control" >{{old('outline')}}</textarea>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="duration">Duration</label>
        <div class="col-sm-10">
            <input type="text" name="duration" class="form-control" value="{{old('text')}}">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="timetable">Time Table</label>
        <div class="col-sm-10">
            <input type="text" name="timetable" class="form-control" value="{{old('timetable')}}">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Starting Date</label>
        <div class="col-sm-10">
            <input type="text" name="startingDate" class="form-control" value="{{old('startingDate')}}">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="fee">Course Fee</label>
        <div class="col-sm-10">
            <input type="text" name="fee" class="form-control" value="{{old('fee')}}">
        </div>
    </div>
    <button class="btn btn-primary float-end" type="submit">Add Course</button>



</form>

    
@endsection

<script>
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
            var img = document.getElementById('imgPreview');
            img.src = reader.result;
            img.style.display = 'block';
           
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>