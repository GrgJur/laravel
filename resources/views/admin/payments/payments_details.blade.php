@extends('layouts.app')

@section('content')

    <div class="page-title">
        <div class="container-fluid">
            <h5>{{__('payment.detail')}}</h5>
        </div>
    </div>
    <br>
    <div class="form-group">
    </div>
    <div class="container-fluid" id="main-wrapper">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                <div class="panel panel-white">
                    <div role="tabpanel">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" href="#tab1"
                                                    data-toggle="tab">{{__('payment.details')}}</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>#{{ $payments->id}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">{{__('payment.date')}}</th>
                                            <td>{{ $payments->date }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{__('payment.member')}}</th>
                                            <td>{{ $payments->member_firstname }} {{ $payments->member_lastname }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{__('payment.instructor')}}</th>
                                            <td>{{ $payments->instructor_lastname }} {{ $payments->instructor_lastname}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{__('payment.course')}}</th>
                                            <td>{{ $payments->description }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{__('payment.amount')}}</th>
                                            <td>{{ $payments->amount }} CHF</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>


            <a href="{{ url()->previous() }}" class="btn btn-primary"><i
                        class="fa fa-angle-double-left"></i>{{__('general.back')}}</a>
        </div>
    </div>


@endsection