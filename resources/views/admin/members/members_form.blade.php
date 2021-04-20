{{ csrf_field() }}
<div class="col-xs-8">
    <label for="title">{{__('member.title')}}</label>
    <select name="title" class="form-control">
        <option value="m" selected="true">@lang('member.mr')</option>
        <option value="f">@lang('member.ms')</option>
    </select>
</div>

<div class="row">
    <div class="form-group">
    </div>
    <div class="col">
        <label class="awesome" for="firstname">{{__('member.firstname')}}</label>
        <input class="form-control" type="text" name="firstname">

    </div>
    <div class="col">
        <label class="awesome" for="lastname">{{__('member.lastname')}}</label>
        <input class="form-control" type="text" name="lastname">
    </div>

</div>
<div class="form-group">
</div>

<div class="row">

    <div class="col">
        <label class="awesome" for="birthdate">{{__('member.birthdate')}}</label>
        <div class="input-append date form_date">
            <input class="form-control" type="date" name="birthdate">
            <span class="add-on"><i class="fa fa-calendar"></i></span>
        </div>
    </div>
    <div class="form-group">
    </div>
    <div class="col">
        <label class="awesome" for="email">{{__('member.email')}}</label>
        <input class="form-control" type="email" name="email">
    </div>
</div>
<div class="col-xs-12">
    <label class="awesome" for="address">{{__('member.address')}}</label>
    <input class="form-control" type="text" name="address">
</div>
<div class="form-group">
</div>
<div class="row">
    <div class="col">
        <label class="awesome" for="zip">{{__('member.zip')}}</label>
        <input class="form-control" type="number" name="zip" min="1000" max="9999">
    </div>
    <div class="col">
        <label class="awesome" for="member">{{__('member.city')}}</label>
        <input class="form-control" type="text" name="city">
    </div>
</div>
<div class="row">
    <div class="col">
        <label class="awesome" for="phone">{{__('member.phone')}}</label>
        <input class="form-control" type="text" name="phone">
    </div>
    <div class="col">
        <label class="awesome" for="mobile">{{__('member.mobile')}}</label>
        <input class="form-control" type="text" name="mobile">
    </div>
</div>
<div class="col-xs-6">
    <label class="awesome" for="work">{{__('member.work')}}</label>
    <input class="form-control" type="text" name="work">
</div>
<div class="col-xs-12">
    <label class="awesome" for="registration">{{__('member.registration')}}</label>
    <div class="input-append date form_date">
        <input class="form-control" type="date" name="registration">
        <span class="add-on"><i class="fa fa-calendar"></i></span>
    </div>
</div>


<div class="form-group">
</div>

<input type="hidden" name="_token" value="{{ Session::token() }}">

<div class="form-group">
    <a href="{{ route('members.index') }}" class="btn btn-primary"><i
                class="fa fa-angle-double-left"></i>{{__('general.back')}}</a>
    <input class="btn btn-primary" type="submit" value="Salva">
</div>

