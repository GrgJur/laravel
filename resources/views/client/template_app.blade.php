<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        @include('layouts.partials.head')

    </head>


    <body>
        <div class="panel-content" style="background-color: #f2f7fc;">
            <div class="container">
                @include('client.nav_client')
                @include('layouts.partials.alert')

                @yield('content')

                @include('layouts.partials.footer')
            </div>
        </div>
        @include('layouts.partials.footer-scripts')

    </body>

</html>

