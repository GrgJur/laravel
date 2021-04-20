<?php

namespace App\Http\Controllers\admin;

use App\Models\Payment;
use App\Models\Member;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\CourseType;
use App\Models\LicenseMember;
use App\Models\Lesson;
use App\Models\License;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use \App\Http\Controllers\Traits;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\View;

class StatisticsController extends Controller
{
    use Traits\InscriptionTraitController;

    public function index(){
        $years = $this->getYears();
        //dd($years);
        return view('admin.statistics.statistics_show', ['years' => $years]);
    }

    public function getYears(){

        $years = array();
        $today = date('Y');
        for ($i=1970; $i < $today; $i++) { 
            array_push($years, $i);
        }
        return $years;

    }

    public function show(){

        $years = $this->getYears();
        $anno = request()->get('year');
        $mesi = [
            1 => 'January',
            2 => 'February',
            3 => 'Maarch',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
        ];
        $id = request()->get('graphic');

        if ($id == 1) {

            $licenses = License::select(['id', 'description'])->pluck('description', 'id');

            foreach ($licenses as $licenseId => $licenseDescription) {

                $stats[$licenseId] = License::selectRaw('COUNT(*) as tot, MONTH(license_member.valid_from) as period')
                        ->join('license_member', 'license_member.license_id', 'licenses.id')
                        ->join('members', 'members.id', 'license_member.member_id')
                        ->groupBy('period')
                        ->whereRaw('YEAR(license_member.valid_from) = '.$anno)
                        ->where('licenses.id', $licenseId)
                        ->where('members.school_id', session()->get('school'))
                        ->orderBy('period')
                        ->get()
                        ->toArray();

            }

            return view('admin.statistics.statistics_show', ['id' => $id, 'allData' => $stats, 'licenze' => $licenses, 'years' => $years, 'anno' => $anno]);

        }elseif ($id == 2) {

            $courseTypes = CourseType::select(['id', 'description'])->pluck('description', 'id');

            foreach ($courseTypes as $courseId => $courseDescription) {
                
                $stats[$courseId] = Course::selectRaw('COUNT(*) as tot, MONTH(courses.start_at) as period')
                        ->join('course_type', 'course_type.id', 'courses.course_type_id')
                        ->groupBy('period')
                        ->whereRaw('YEAR(courses.start_at) = '.$anno)
                        ->where('course_type.id', $courseId)
                        ->where('courses.school_id', session()->get('school'))
                        ->orderBy('period')
                        ->get()
                        ->toArray();

            }

            return view('admin.statistics.statistics_show', ['id' => $id, 'allData' => $stats, 'corsi' => $courseTypes, 'years' => $years, 'anno' => $anno]);

        }elseif ($id == 3) {

            $courseTypes = CourseType::select(['id', 'description'])->pluck('description', 'id');

            foreach ($courseTypes as $courseId => $courseDescription) {
                
                $stats[$courseId] = Course::selectRaw('COUNT(*) as tot, MONTH(lessons.date_time) as period')
                        ->join('course_type', 'course_type.id', 'courses.course_type_id')
                        ->join('lessons', 'lessons.course_id', 'courses.id')
                        ->groupBy('period')
                        ->whereRaw('YEAR(lessons.date_time) = '.$anno)
                        ->where('course_type.id', $courseId)
                        ->where('courses.school_id', session()->get('school'))
                        ->orderBy('period')
                        ->get()
                        ->toArray();

            }

            return view('admin.statistics.statistics_show', ['id' => $id, 'allData' => $stats, 'corsi' => $courseTypes, 'years' => $years, 'anno' => $anno]);

        }elseif ($id == 4) {

            $stats = Member::selectRaw('COUNT(*) as tot, MONTH(members.registration) as period')
                    ->groupBy('period')
                    ->whereRaw('YEAR(members.registration) = '.$anno)
                    ->where('members.school_id', session()->get('school'))
                    ->orderBy('period')
                    ->get()
                    ->toArray();

            return view('admin.statistics.statistics_show', ['id' => $id, 'allData' => $stats, 'years' => $years, 'anno' => $anno]);

        }else{

        }
        
        
    }

}