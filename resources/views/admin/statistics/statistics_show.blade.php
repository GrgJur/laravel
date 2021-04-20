@extends('layouts.app')

@section('content')

<div>
    <h1>Grafici Statistici</h1>
    <form action="{{ route('statistics.show')}}" method="post">
    	@csrf
    	<select name="graphic" style="float: left;">
			<option value="1">Licenze assegnate</option>
			<option value="2">Numero di corsi</option>
			<option value="3">Numero di lezioni</option>
			<option value="4">Numero di allievi</option>
	    </select>

	    <select name="year" style="float: left;">
			@for($i=0; $i < count($years); $i++)
				<option value="{{$years[$i]}}">{{$years[$i]}}</option>
			@endfor
	    </select>

	    <input type="submit" value="show">	
    </form>
</div>

<div id="container"></div>

@if(isset($id))
	@if ($id == 1)
		@include('admin.statistics.statistics_graphic_assigned_licenses')
	@elseif($id == 2)
		@include('admin.statistics.statistics_graphic_numbers_courses')
	@elseif($id == 3)
		@include('admin.statistics.statistics_graphic_numbers_lessons')
	@elseif($id == 4)
		@include('admin.statistics.statistics_graphic_numbers_members')
	@endif
@endif

@endsection