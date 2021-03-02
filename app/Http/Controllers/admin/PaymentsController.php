<?php

namespace App\Http\Controllers\admin;

use App\Models\Payment;
use App\Models\Member;
use App\Models\Course;
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
    public function index(){

        $payments = DB::table('payments')
                    ->join('')

        return view('admin.payments.payments_show', ['payments' => DB::table('payments')->paginate(10)]);
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
     * Mostra la scheda dei dettagli di un pagamento
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $payment = Payment::find($id);
        return view('admin.payments.payments_details',compact('payment','id'));
    }

    /**
     * Mostra il form con la quale si potra modificare un pagamento
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment = Payment::find($id);
        return view('admin.payments.payments_edit',compact('payment','id'));
    }

}
