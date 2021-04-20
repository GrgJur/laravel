@extends('client.template_app')

@section('content')

    <div class="page-title">
        <div class="container-fluid">
            <h5>{{__('course.create')}}:
            </h5>
        </div>
    </div>
    <br>

    <div class="container-fluid">
        <div class="panel panel-default p-3 mb-2 bg-light text-dark">
        @include('common.errors')

        <!-- New lesson Form -->
  
            {{ csrf_field() }}
                <div class="form-group">
                </div>

                <div class="row">

                    <div class="col-sm-5">
                        <label for="type">{{__('course.type')}}</label><p>
                        <select name="type" id="type">
                            @foreach($type as $typeId => $typeLabel)
                                <option value="{{ $typeId }}" @if($typeId === $actualTypeId) selected @endif>{{ $typeLabel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <label for="facebook">{{__('course.facebook')}}</label>
                        <input type="text" name="facebook" id="facebook" class="form-control" value="{{ old('facebook') }}">
                    </div>

                </div>

                <div class="form-group">
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">

        </div>
    </div>


@endsection