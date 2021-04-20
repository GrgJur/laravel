<?php

namespace App\Http\Controllers\admin;

use App\Models\School;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use \App\Http\Controllers\Traits;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\View;

class SchoolsController extends Controller
{

	use Traits\InscriptionTraitController;

	public function index(){

		$schools = $this->getSchools();

		return view('admin.schools.schools_show', ['schools' => $schools]);
	}

	public function getSchools(){

        $schools = School::select('id', 'name')
            ->get();

        return $schools;

    }

    public function school(Request $request, $id){

        $schools = School::find($id);

    	$request->session()->put('school', $id);
        $request->session()->put('school_name', $schools['name']);
    	return view('home');

    }

}