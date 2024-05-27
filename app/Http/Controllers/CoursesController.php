<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','detail']);
    }
    //for index page and course type checking
    public function index(Request $request){
        $title = $request->query('title');

        if ($title == "all" || $title == null) {
            $data = Course::all();
        }else{
            $data = Course::where('type', $title)->get();
        }

        return view('course.index',['courses'=> $data ]);
    }

    //for detail page 
    public function detail($id){

        $data = Course::find($id);
        $enrolledSeatNumbers = Enrollment::where('course_id' , $id)->get();
        $enrolled = $enrolledSeatNumbers->count();
        $availableSeats = 20 - $enrolled;
            if(auth()->check()){
                $isEnrolled = Enrollment::where('course_id' , $id )
                ->where('user_id' , auth()->user()->id)->exists();
            
            }else{
                $isEnrolled =false ;
            }

            return view('course.detail', ['details' => $data , 'availableSeats' => $availableSeats , 'enrolledSeatNumbers' => $enrolledSeatNumbers,'isEnrolled' => $isEnrolled]);
           
    }

    public function enroll($courseId){

        $validator = validator(request()->all() , [
            "seat" => "required",
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $seatValue = request()->input('seat');
        $courseData = Course::find($courseId);
                         
        return view('course.enroll' , ['courseId' => $courseId,'courseData' => $courseData, 'seatValue'=> $seatValue]);
    }
    public function submit(){

        $validator = validator(request()->all() , [
            "phNumber" =>"required",
            "payment" => "required",

        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        
        $enrollment = new Enrollment();
        $enrollment->user_id = request()->userId;
        $enrollment->course_id = request()->courseId;
        $enrollment->seat_number = request()->seatNumber;
        $enrollment->phone_number = request()->phNumber;
        $enrollment->transfer_name = request()->payment;
        $enrollment->payment_validator =request()->paymentValidator;
        $enrollment->save();
        
        return redirect('/courses/enroll-dashbord');
    
    }
    public function enrollDashbord(){

        $enrollData = Enrollment::where('user_id' , auth()->user()->id)->get();
        return view('course.enrollDashbord',['enrollData' => $enrollData]);

      

      
      

        // if ($request->has('eid') && $request->has('validator')) {
        //     $eId = request()->query('eid');
        //     $validator = request()->query('validator');
    
        //     if (!$validator) {
        //       $data = Enrollment::where('id' , $eId)->first();
        //       $data->payment_validator = 1 ;
        //       if(Gate::allows('payment-validator')){
        //         $data->save();
        //         return back();
        //     }else{
        //         return back();
        //     }
              
        //     }
        // } else {
        //     $enroll =Enrollment::all();
        //     return view("course.enrollDashbord",["enrollData" => $enroll] );
        // }
        
        
    }
    
}
