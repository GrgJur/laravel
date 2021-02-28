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
        return view('admin.payments.payments_show');
    }

    /**
     * Metodo che serve a ricercare un pagamento
     * @param  request $request parola da cercare
     * @return view
     */
    public function search(Request $request)
    {
        $search = $request->get('search');
        $payments = Payments::where('email', 'LIKE', $search.'%')
            ->orWhere('firstname', 'LIKE', $search.'%')
            ->orWhere('lastname', 'LIKE', $search.'%')
            ->orWhere('address', 'LIKE', $search.'%')
            ->orWhere('birthdate', 'LIKE', $search.'%')->paginate(10);
        $payments->appends(['search' => $search]);
        return view('admin.payments.payments_show', compact('payments'))->with($search);
    }
}
