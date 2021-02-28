@extends('layouts.app')

@section('content')

    <div class="page-title">
        <div class="container-fluid">
            <h5>{{__('member.add')}}</h5>
        </div>
    </div>
    <br>
    <div class="form-group">
    </div>
    <div class="container-fluid">
        <div class="panel panel-default p-3 mb-2 bg-light text-dark">
            <form class="form-horizontal" action="{{ route('members.store') }}" method="POST">
                @include('admin.members.members_form', ['submitButtonText' =>__('member.add')])
            </form>
        </div>
    </div>


@endsection

