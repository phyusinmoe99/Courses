@extends('layouts.adminDashbord')
@section('adminContent')
    <div class="container">
        @foreach ($newEnrollments as $newEnrollment)
        <div class="card mb-2">
            <div class="card-body">
                <ul class="list-group">
                    <div class="row row-cols-2">
                        <li class="col-sm-4 col-6 list-group-item list-group-item-info border-0">Course Title</li>
                        <li class="col-sm-8 col-6 list-group-item list-group-item-info border-0">{{ $newEnrollment->course->title }}</li>
                    </div>
                    <div class="row row-cols-2">
                        <li class="col-sm-4 col-6 list-group-item list-group-item-info border-0">Student ID</li>
                        <li class="col-sm-8 col-6 list-group-item list-group-item-info border-0">{{ $newEnrollment->user->id }}</li>
                    </div>
                    <div class="row row-cols-2">
                        <li class="col-sm-4 col-6 list-group-item list-group-item-info border-0">Student Name</li>
                        <li class="col-sm-8 col-6 list-group-item list-group-item-info border-0">{{ $newEnrollment->user->name }}</li>
                    </div>
                    <div class="row row-cols-2">
                        <li class="col-sm-4 col-6 list-group-item list-group-item-info border-0">Course Fee</li>
                        <li class="col-sm-8 col-6 list-group-item list-group-item-info border-0">{{ $newEnrollment->course->fee }}</li>
                    </div>
                    <div class="row row-cols-2">
                        <li class="col-sm-4 col-6 list-group-item list-group-item-info border-0">Enroll Date</li>
                        <li class="col-sm-8 col-6 list-group-item list-group-item-info border-0">{{ $newEnrollment->created_at}}</li>
                    </div>
                    <div class="row row-cols-2">
                        <li class="col-sm-4 col-6 list-group-item list-group-item-info border-0">Payment</li>
                        <li class="col-sm-8 col-6 list-group-item list-group-item-info border-0">
                            <a href="{{ url('/admin/new-enrollment?eid=' . $newEnrollment->id . '&validator=' . $newEnrollment->payment_validator) }}" 
                                class="btn btn-danger" 
                                >Pending
                               
                             </a>
                        </li>
                    </div>
                    
                    
                    
                </ul>
            </div>
        </div>
            
        @endforeach
    </div>
@endsection