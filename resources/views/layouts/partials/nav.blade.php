<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">

    <div class="container-fluid ">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('homepage.index')}}">{{__('navigation.title')}}</a>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav">

                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle {{Request::is('admin/lessons')? 'nav-link active' : 'nav-link'}}" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{__('navigation.courses')}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                         @csrf
                                @foreach(\App\Models\CourseType::all() as $type)
                                    <a class="dropdown-item" href="{{ route('lessons.index',['type'=>$type->description]) }}">{{$type->description}}</a>
                                    <div class="dropdown-divider"></div>
                                @endforeach
                        </div>
                    </li>

                    <li>
                        <a class="{{Request::is('admin/members')? 'nav-link active' : 'nav-link'}}" href="{{route('members.index')}}">{{__('navigation.all')}}</a>
                    </li>
                    <li>
                        <a class="{{Request::is('admin/payments/index')? 'nav-link active' : 'nav-link'}}" href="{{route('payments.index')}}">{{__('navigation.pay')}}</a>
                    </li>
                    <li>
                        <a class="{{Request::is('admin/statistics/index')? 'nav-link active' : 'nav-link'}}" href="{{route('statistics.index')}}">{{__('navigation.stats')}}</a>
                    </li>
                    <li>
                        <a class="{{Request::is('admin/schools/index')? 'nav-link active' : 'nav-link'}}" href="{{route('schools.index')}}">{{__('navigation.schools')}}</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('messages.chat')}}">{{__('navigation.mess')}}</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('admin.logout')}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LOGOUT</a>
                    </li>
                </ul>
        </div>
    </div>
</nav>
<div class="form-group">
</div>