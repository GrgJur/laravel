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
                    <input name="search" class="form-control input-search" type="text" placeholder="{{__('payment.search')}}" value="{{ app('request')->input('search') }}">
                    &nbsp;
                    <span class="input-group-btn">
                        <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
    </div> 


    @if (count($payments) > 0)
            <div class="panel-body">

                <div class="form-group">
                </div>
                <div class="pull-left">
                    <a class="btn btn-success" href="{{ route('payments.create') }}">{{__('payment.add')}}</a>
                </div>
                <div class="table-responsive">

                    <div class="form-group">
                    </div>
                        <table class="table table-striped responsive-table" id="dt">

                            <!-- Table Headings -->
                            <thead>
                                <th>{{__('payment.date')}}</th>
                                <th>{{__('payment.member')}}</th>
                                <th>{{__('payment.course')}}</th>
                                <th>{{__('payment.instructor')}}</th>
                                <th>{{__('payment.amount')}}</th>
                                <th>&nbsp;</th>
                                <th></th>
                                <th></th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                            @foreach ($payments as $payment)

                                <tr>
                                    <td class="table-text"><div>{{ $payment->date }}</div></td>
                                    <td class="table-text"><div>{{ $payment->member->lastname }}</div></td>
                                    <td class="table-text"><div>{{ $payment->course_type->description }}</div></td>
                                    <td class="table-text"><div>{{ $payment->instructor->lastname }}</div></td>
                                    <td class="table-text"><div>{{ $payment->amount }}</div></td>
                                    <td>
                                        <a href="{{ route('payments.details',$payment->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye" title="{{__('payment.details')}}"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('payments.edit',$payment->id) }}" class="btn btn-info btn-xs edit"><i class="fa fa-pencil" title="{{__('payment.edit')}}"></i></a>
                                    </td>
                                    <td>
                                        <form class="delete" action="{{ route('payments.destroy',$payment->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger btn-xs btn-delete" >
                                                <i class="fa fa-trash-o" title="{{__('payment.delete')}}"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    <div class="pull-right align-bottom">
                        {{ $payments ?? ''->links() }}
                    </div>
                </div>
            </div>
        </div>
        @endif

@endsection