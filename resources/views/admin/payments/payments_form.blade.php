{{ csrf_field() }}
<div class="col-xs-8">
    <label for="title">{{__('payment.date')}}</label>
    <input class="form-control" type="date" name="date">
</div>

<div class="row">
    <div class="form-group">
    </div>
    <div class="col">
        <label class="awesome" for="member">{{__('payment.member')}}</label>
        <select class="form-control" name="member">
            @foreach($members as $member)
                <option value="{{$member->id}}">{{$member->firstname}} {{$member->lastname}}</option>
            @endforeach
        </select>

    </div>
    <div class="col">
        <label class="awesome" for="instructor">{{__('payment.instructor')}}</label>
        <select class="form-control" name="instructor">
            @foreach($instructors as $instructor)
                <option value="{{$instructor->id}}">{{$instructor->firstname}} {{$instructor->lastname}}</option>
            @endforeach
        </select>

    </div>

</div>
<div class="form-group">
</div>

<div class="row">

    <div class="col">
        <label class="awesome" for="course">{{__('payment.course')}}</label>
        <select class="form-control" name="course">
            @foreach($course_types as $course_type)
                <option>{{$course_type->description}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
    </div>
    <div class="col">
        <label class="awesome" for="amount">{{__('payment.amount')}}</label>
        <input class="form-control" type="number" step="0.01" name="amount">
    </div>
</div>


<div class="form-group">
</div>

<input type="hidden" name="_token" value="{{ Session::token() }}">

<div class="form-group">
    <a href="{{ route('payments.index') }}" class="btn btn-primary"><i
                class="fa fa-angle-double-left"></i>{{__('general.back')}}</a>
    <input class="btn btn-primary" type="submit" value="Salva">
</div>

