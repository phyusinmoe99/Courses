<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class AdminDashbordController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index(){
        $data = Course::all();
        return view('admin.dashbord' ,['courses' => $data]);
    }
    public function add(){
        return view('admin.create');

    }
    public function delete($id){
        
        $data = Course::find($id);
        $courseName = Course::where('id' , $id)->pluck('title')->first();
        $data->delete();
        return redirect("/admin/dashbord")->with('info' , "$courseName is deleted!");

        
    }
    public function newEnroll(Request $request){

        $eId = $request->query('eid');
        $validator = $request->query('validator');
  
        if($eId && !$validator){
          $valid = Enrollment::find($eId);
          $valid->payment_validator = 1 ;
          $valid->save();
          return redirect('/admin/new-enrollment');
  
        }

        $enroll = Enrollment::where('payment_validator' , 0)->get();
        return view('admin.newEnrollment',['newEnrollments' => $enroll]);
    }
   
    public function create(){
        $validator = validator(request()->all(),[
            "courseImg" => "required",
            "title" => "required",
            "type" => "required",
            "content" => "required",
            "outline" => "required",
            "duration" => "required",
            "timetable" => "required",
            "startingDate" => "required",
            "fee" => "required",

        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $course = new Course;
        $course->image_path = request()->file('courseImg')->store('courseImg','public');
        $course->title = request()->title;
        $course->type = request()->type;
        $course->content = request()->content;

        $outlineArray = explode(',', request()->outline);
        $course->course_outline = serialize($outlineArray);
        $course->duration = request()->duration;
        $course->starting_date = request()->startingDate;
        $course->timetable = request()->timetable;
        $course->fee = request()->fee;
        $course->save();


        return redirect("/admin/dashbord");
        
    }
    
    public function search(Request $request){

        
        if ($request->isMethod('get')) {
            $data = Enrollment::all();

            return view('admin.studentsList' , ['enrolledData' => $data]);
        }


        $validator = validator($request->all() , [
           'searchBy' => 'required',
           'search' => 'required',
        ]);


        $searchBy = $request->searchBy;
        $search = $request->search;

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        switch ($searchBy) {
            case 'user_id':
              $data = Enrollment::where('user_id' , $search)->get();
              break;

            case 'user_name':
                $data = Enrollment::wherehas('user' , function($query) use ($search){
                    $query->where('name',$search);
                })->get();
                break;

            case 'course_name':
                 $data = Enrollment::wherehas('course' , function($query) use ($search){
                        $query->where('title',$search);
                    })->get();
                 break;
          
        }

        // return view('admin.studentsList' , ['enrolledData' => $data, 
        // 'oldInput' => $request->all()]);
        return redirect('/admin/student-list')->withInput()->with(['enrolledData' => $data]);
    }

   

}
