<?php

namespace App\Http\Controllers\admin;

use App\Models\Course;
use App\Models\CourseType;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $actualTypeId=CourseType::where('description', $request->get('type'))->first()->id;

        $type = CourseType::select(DB::raw("CONCAT(description,' (',long_description,')')as type"),'id')
            ->pluck('type', 'id');

        return view('admin.courses.courses_create',compact('type','actualTypeId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course=new Course();

        $course->course_type_id =$request->type;
        if (empty($request->facebook)) {
            $course->facebook='kAied234Xle9PW';
        }else{
            $course->facebook=$request->facebook;
        }
        $course->start_at=now()->toDateString();
        $course->school_id=$request->session()->get('school');
        $course->save();



        //return redirect()->route('members.index')->with('success','Member Added');
        return redirect()->route('lessons.index',['type'=>$course->type->description])->with('success',trans('course.added'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course=Course::findOrFail($id);
        $course->delete();


        return redirect()->route('lessons.index',[$course->type->description])->with('success',trans('course.deleted'))->with('typ',$course->type->description);
    }

}

