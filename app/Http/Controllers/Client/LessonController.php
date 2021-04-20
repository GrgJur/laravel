<?php

namespace App\Http\Controllers\Client;


use App\Models\Course;
use App\Models\LicenseMember;
use App\Models\Member;
use App\Models\Status;
use App\Models\Instructor;
use App\Models\Lesson;
use App\Models\LessonLicenseMember;
use Carbon\Carbon;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Yajra\DataTables\DataTables;


class LessonController extends Controller
{


    public function index($typ)
    {
        $courses = Course::select ('courses.id','courses.course_type_id','courses.facebook')
            ->orderBy('courses.id','desc')
            ->leftJoin('lessons','lessons.course_id','courses.id') // LEFT JOIN ON lessons.course_id = courses.id
            ->leftJoin('course_type','courses.course_type_id','course_type.id')
            ->where('course_type.description','=', $typ)
            ->where('courses.school_id', session()->get('school'))
            ->paginate(10);

        return view('client.lessons.lessons_show',compact('courses','typ'));
    }


    /**
     * Metodo che serve a ricercare un corso
     * @param  request $request parola da cercare
     * @return view
     */
    public function search(Request $request,$typ)
    {
        $search = $request->get('search');

        $courses = Course::select ('courses.id','courses.course_type_id','courses.facebook')
            ->distinct()
            ->orderBy('courses.id','desc')
            ->join('lessons','lessons.course_id','courses.id')
            ->join('instructors','lessons.instructor_id','instructors.id')
            ->join('course_type','courses.course_type_id','course_type.id')
            ->where('course_type.description','LIKE', $typ)
            ->where(function($query) use ($search){
                $query->where('date_time', 'LIKE', '%'.$search . '%')
                    ->orWhere('number', 'LIKE', $search . '%')
                    ->orWhere('lastname', 'LIKE', $search . '%')
                    ->orWhere('firstname', 'LIKE', $search . '%');
            })
            ->paginate(10);

        $courses->appends(['search' => $search]);
        return view('client.lessons.lessons_show', compact('courses','typ'))->with($search);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);
        return view('client.lessons.lessons_detail',compact('lesson'));
    }



}


