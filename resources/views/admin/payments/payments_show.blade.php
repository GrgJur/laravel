@extends('layouts.app')

@section('content')

	<div class="page-title">
        <div class="container-fluid">
            <h5>Pagamenti</h5>
        </div>
        <div class="form-group">
        </div>
    </div>
    <div class="container-fluid">
        <div class="search p bg-light m-b-sm">
            <form method="GET" action="{{ route('payments.search') }}">
                @csrf
                <div class="input-group">
                    <input name="search" class="form-control input-search" type="text" placeholder="" value="">
                    &nbsp;
                    <span class="input-group-btn">
                        <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
    </div> 

@endsection