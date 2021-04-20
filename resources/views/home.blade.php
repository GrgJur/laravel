<!-- importa cartella.file -->
@extends('layouts.app')

@section('content')

    <div class="">
    	<h2>Dashboard</h2>
        <div class="panel panel-default">
       
        	<ul>
        		<li>Amministratore: {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</li>
        		<li>Sede scolastica: {{session()->get('school_name')}}</li>
        	</ul>

        </div>
    </div>

@endsection