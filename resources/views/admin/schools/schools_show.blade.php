@extends('layouts.app')

@section('content')

<div style="width: 100%; float: left;">
	<h2>Sedi scolastiche</h2>
	@foreach($schools as $school)
			<div 
				style="width: 31%; 
				float: left;
			 	border: 2px solid black; 
				margin-right: 1%; 
				margin-left: 1%;
				margin-bottom: 5px; 
				text-align: center;">
				
				<a href="{{route('schools.school', $school['id'])}}">{{$school['name']}}</a>

			</div>

	@endforeach

	
</div>
<div style="width: 100%: float:left;"><b>Numero di sedi {{count($schools)}}</b></div>

@endsection