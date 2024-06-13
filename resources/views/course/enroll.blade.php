@extends('layouts.app')

@section('content')

    <div class="container">
        {{-- @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $err )
                        {{$err}}
                    @endforeach
                </div>
                    
        @endif --}}
        
        <form method="POST" action="{{url("/courses/enroll/{$courseId}")}}">
            @csrf
            <input type="hidden" name="courseId" value="{{$courseId}}">
            <input type="hidden" name="userId" value="{{auth()->id()}}">
            <input type="hidden" name="paymentValidator" value=0>
           
            <div class="row mb-2">
                <label class="col-sm-2 col-form-label">Course</label>
                <div class="col-sm-10">
                    
                    <input type="text" name="courseName" class="form-control" value="{{$courseData->title}}" disabled>
                </div>
                
                
            </div>
            
            <div class="row mb-2">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="userName" class="form-control" value="{{auth()->user()->name}}" disabled>
                </div>
                
            </div>
            <div class="row mb-2">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" value="{{auth()->user()->email}}" disabled>
                </div>
                
            </div>
            <div class="row mb-2">
                <label class="col-sm-2 col-form-label">Your Seat</label>
                <div class="col-sm-10">
                    <input type="hidden" name="seatNumber" value="{{$seatValue}}">
                    <input type="text" class="form-control" value="{{$seatValue}}" disabled>
                </div>
                
            </div>
            <div class="row mb-2">
                <label class="col-sm-2 col-form-label">Phone Number</label>
                <div class="col-sm-10">
                    <input type="text" name="phNumber" class="form-control" placeholder="Real Contact Number">
                </div>
                
            </div>
            <div class="row mb-2">
                <label class="col-sm-2 col-form-label">Transfer Name</label>
                <div class="col-sm-10">
                    
                    <input type="text" name="payment" class="form-control" placeholder="KBZ Pay Name">
                    <div class="form-text">KPAY NO:09852456753 NAME:UNIQUE CAMP</div>
                </div>
                
            </div>

            <button class="btn btn-success float-end">Enroll</button>

        </form>
       
        
    </div>
@endsection