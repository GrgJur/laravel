<?php

namespace App\Http\Controllers\admin;

use App\Models\Payment;
use App\Models\Member;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\CourseType;
use App\Models\School;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use \App\Http\Controllers\Traits;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\View;

class PaymentsController extends Controller
{

	use Traits\InscriptionTraitController;

	/**
	 * Metodo che serve per mostrare la lista dei pagamenti
	 * @return view
	 */
    public function index(Request $request){

        $payments = Payment::select('payments.*', 'members.firstname AS member_firstname', 'members.lastname AS member_lastname', 'instructors.firstname AS instructor_firstname', 'instructors.lastname AS instructor_lastname', 'course_type.description')
                    ->join('members', 'payments.member_id', 'members.id')
                    ->join('instructors', 'payments.instructor_id', 'instructors.id')
                    ->join('courses', 'payments.course_id', 'courses.id')
                    ->join('course_type', 'courses.course_type_id', 'course_type.id')
                    ->where('members.school_id', $request->session()->get('school'))
                    ->paginate(10);

        return view('admin.payments.payments_show', ['payments' => $payments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function create()
    {
        $members = Member::all()->where('school_id', session()->get('school'));
        $instructors = Instructor::all()->where('school_id', session()->get('school'));
        $course_types = CourseType::all();
        return view('admin.payments.payments_create', compact('members', 'instructors', 'course_types'));
    }

    /**
     * Metodo che serve a ricercare un pagamento
     * @param  request $request parola da cercare
     * @return view
     */
    public function search(Request $request)
    {
        $search = $request->get('search');
        $payments = Payment::where('date', 'LIKE', $search.'%')
            ->orWhere('member_id', 'LIKE', $search.'%')
            ->orWhere('course_id', 'LIKE', $search.'%')
            ->orWhere('instructor_id', 'LIKE', $search.'%')
            ->orWhere('amount', 'LIKE', $search.'%')->paginate(10);
        $payments->appends(['search' => $search]);
        return view('admin.payments.payments_show', compact('payments'))->with($search);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Payment::create($request->validate([
            'date'=> 'bail|required|date',
            'member_id' => 'bail|required|numeric',
            'instructor_id'  => 'bail|required|numeric',
            'course_id'     => 'bail|required|numeric',
            'amount'=> 'bail|required|numeric|min:100|max:999',

        ]));

        return back()->with('success',trans('payment.created'));
    }

    /**
     * Mostra la scheda dei dettagli di un pagamento
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $payments = Payment::select('payments.*', 'members.firstname AS member_firstname', 'members.lastname AS member_lastname', 'instructors.firstname AS instructor_firstname', 'instructors.lastname AS instructor_lastname', 'course_type.description')
                    ->join('members', 'payments.member_id', 'members.id')
                    ->join('instructors', 'payments.instructor_id', 'instructors.id')
                    ->join('courses', 'payments.course_id', 'courses.id')
                    ->join('course_type', 'courses.course_type_id', 'course_type.id')
                    ->where('payments.id', $id)
                    ->first();

        return view('admin.payments.payments_details', ['payments' => $payments]);
    }

    /**
     * Mostra il form con la quale si potra modificare un pagamento
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payments = Payment::find($id);
        $members = Member::all()->where('school_id', session()->get('school'));
        $instructors = Instructor::all()->where('school_id', session()->get('school'));
        $course_types = CourseType::all();
        return view('admin.payments.payments_edit', compact('members', 'instructors', 'course_types', 'payments'));
    }

    /**
     * Update the specified resource in storage.
     , 'payments*
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $payments = Payment::findOrFail($id);

        $payments->update($request->validate([
            'date'=> 'bail|required|date',
            'member' => 'bail|required|max:100',
            'instructor'  => 'bail|required|max:100',
            'course'     => 'bail|required|max:100',
            'amount'=> 'bail|required|numeric|min:100|max:999',
        ]));

        return back()->with('success',trans('payment.updated'));
    }

    /**
     * Elimina il record di un determinato pagamento
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Payment::findOrFail($id)->delete();
        return back()->with('success',trans('payment.deleted'));
    }

}
