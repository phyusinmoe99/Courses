@extends('layouts.app')

@section('content')

<div class="container">
    
        <div class="row g-2">
            <div class="col-md-4 ">
                <div class="card h-100 ">
                  
                    <img src="{{asset($details->image_path)}}" class="h-50 card-img p-4">
                    <div class="card-body">
                      
                        <h5 class="card-title">
                        Please select your preferred seat!!</h5> 
                        <div class="text-success">Available Seats : {{$availableSeats}}</div>

                   
                      <form method="POST">
                        @csrf
                        <div class="row">
                            @for ($i = 1; $i <= 20; $i++) 
                                @php $disabled = in_array($i, $seatNumbers->pluck('seat_number')->toArray()) ? 'disabled' : '' @endphp
                                <div class="col-3">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="seat" value="{{$i}}" {{$disabled}}>
                                        <label class="form-check-label" for="seat{{$i}}"><i class="fa-solid fa-desktop" style="color: {{$disabled ? 'red' : 'green'}}"></i></label>
                                    </div>
                                </div>
                            @endfor
                            <button type="submit" class="btn btn-info mt-2">Enroll</button>
                        </div>
                      </form>

                    </div>

                    
                  
                </div>

                
            </div>

            <div class="col-md-8">
              <div class="card">
                <div class="card-body">
                  <ul class="list-group">
                      
                      <li class="list-group-item">
                          <div class="row">
                              <div class="col">Content :</div>
                              <div class="col">{{$details->content}}</div>
                          </div>
                      </li>
                      <li class="list-group-item list-group-item-dark ">
                          <div class="row">
                              <div class="col">Course Outline :</div>
                              <div class="col">
                                  <ul class="list-group list-group-flush">
                                      @foreach (unserialize($details->course_outline) as $outline)
                                      <li class="list-group-item list-group-item-dark">
                                          {{$outline}}
                                      </li>
                                      @endforeach
                                  </ul>
                              </div>
                          </div>
                      </li>
                      <li class="list-group-item">
                        <div class="row">
                            <div class="col">Starting Date :</div>
                            <div class="col">{{$details->starting_date}}</div>
                        </div>
                      </li>
                      <li class="list-group-item">
                          <div class="row">
                              <div class="col">Duration :</div>
                              <div class="col">{{$details->duration}}</div>
                          </div>
                      </li>
                      <li class="list-group-item list-group-item-dark">
                          <div class="row">
                              <div class="col">Time Table :</div>
                              <div class="col">{{$details->timetable}}</div>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="row">
                              <div class="col">Course Fee :</div>
                              <div class="col">{{$details->fee}}</div>
                          </div>
                      </li>
                      
                  </ul>
              </div>
              </div>
                
            </div>
        </div>
    
</div>
@endsection
