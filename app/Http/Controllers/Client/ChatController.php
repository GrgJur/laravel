<?php

namespace App\Http\Controllers\Client;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\View;
use App\Models\Message;
use App\Models\Instructor;
use App\Models\Member;

class ChatController extends Controller
{
	public function index() 
	{
		$user = auth()->user(); // utente loggato

		if (request()->ajax()) {

			// query che ritorna tutti i messaggi con paginazione
			$messages = Message::where('member_id', $user->id)->orderBy('id', 'desc')->get();

			return response()->json([
				'message' => $messages
			]);
		}

		return view('client.message');
	}
	
	public function store(Request $request) {
		$user = request()->user(); // utente loggato


		$message = $user->messages()->create([
			'title' => $request->title,
			'text' => $request->text,
			'instructor_id' => $request->instructor_id,
			'sent' => 'member' // member o instruct id
		]);

		return response()->json(
			[
				'message' => $message
			]
		);
	}


	public function instructors() 
	{
		return response()->json(
			Instructor::all()
		);
	}
}