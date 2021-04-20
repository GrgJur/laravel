@extends('layouts.app')

@section('content')

    <div class="page-title">
        <div class="container-fluid">
            <h5>{{__('payment.edit')}}</h5>
        </div>
    </div>
    <div class="form-group">
    </div>
    <div class="container-fluid">
        @include('common.errors')
        <div class="row">
            <div class="col-12">
                <div class="panel panel-white">
                    <div class="form-group"></div>
                    <div role="tabpanel">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" href="#tab1"
                                                    data-toggle="tab">{{__('payment.details')}}</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1" role="tabpanel">
                                <div class="panel panel-default p-3 mb-2 bg-light text-dark">
                                    <div class="form-group"></div>
                                    <form action="{{ route('payments.update',$payments) }}" method="POST">
                                        @include('admin.payments.payments_form')
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection