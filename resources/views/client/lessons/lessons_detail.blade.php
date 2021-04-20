@extends('layouts.app')

@section('content')

    <div class="page-title">
        <div class="container-fluid">
            <h5>{{__('lesson.detail')}}</h5>
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
                            <li class="nav-item"><a class="nav-link active" href="#tab1" data-toggle="tab">{{__('lesson.detail')}}</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th scope="row">{{__('lesson.date_time')}}</th>
                                            <td>{{ $lesson->date_time }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{__('lesson.number')}}</th>
                                            <td>{{$lesson->number}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{__('lesson.instructor')}}</th>
                                            <td>{{$lesson->instructor->firstname}} {{$lesson->instructor->lastname}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{__('lesson.status')}}</th>
                                            <td>{{ $lesson->status->description }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{__('lesson.type')}}</th>
                                            <td>{{$lesson->course->type->description}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{__('lesson.num_members')}}</th>
                                            <td>{{count($lesson->LessonLicenseMember)}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <a href="{{ url()->previous()}}#{{$lesson->course->id}}"class="btn btn-primary"><i class="fa fa-angle-double-left"></i>{{__('general.back')}}</a>
        </div>
    </div>


@endsection
