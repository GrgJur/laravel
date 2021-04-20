@extends('client.template_app')

@section('content')

<p>BENVENUTO {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</p>

@endsection