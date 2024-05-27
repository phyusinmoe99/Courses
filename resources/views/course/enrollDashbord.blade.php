@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($enrollData as $enroll)
    
        
        <div class="card mb-2">
            <div class="card-body">
                <ul class="list-group">
                    <div class="row row-cols-2">
                        <li class="col-sm-4 col-6 list-group-item list-group-item-info border-0">Course Title</li>
                        <li class="col-sm-8 col-6 list-group-item list-group-item-info border-0">{{ $enroll->course->title }}</li>
                    </div>
                    <div class="row row-cols-2">
                        <li class="col-sm-4 col-6 list-group-item list-group-item-dark border-0">Name</li>
                        <li class="col-sm-8 col-6 list-group-item list-group-item-dark border-0">{{ $enroll->user->name }}</li>
                    </div>
                    <div class="row row-cols-2">
                        <li class="col-sm-4 col-6 list-group-item list-group-item-info border-0">Seat Number</li>
                        <li class="col-sm-8 col-6 list-group-item list-group-item-info border-0">{{ $enroll->seat_number }}</li>
                    </div>
                    <div class="row row-cols-2">
                        <li class="col-sm-4 col-6 list-group-item list-group-item-dark border-0">Enrollment</li>
                        <li class="col-sm-8 col-6 list-group-item list-group-item-dark border-0">
                            @php
                                $valid = "Pending";
                                if ($enroll->payment_validator) {
                                    $valid = "Success";
                                    
                                }
                            @endphp
                            <span class="badge rounded-pill" style="background-color: {{ $enroll->payment_validator ? 'green' : 'lightcoral' }}">{{$valid}}</span>

                            {{-- <a href="{{ url('/courses/enroll-dashbord?eid=' . $enroll->id . '&validator=' . $enroll->payment_validator) }}" 
                                class="btn btn-dark" 
                                style="background-color: {{ $enroll->payment_validator ? 'green' : 'lightcoral' }}" 
                                {{ $enroll->payment_validator ? 'disabled' : '' }}>
                                {{ $valid }}
                             </a> --}}


                             
                        </li>
                    </div>
                </ul>
            </div>
        </div>
   
    @endforeach
</div>
@endsection
