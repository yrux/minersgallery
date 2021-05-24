<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{ !isset($title)?config('app.name', 'Laravel'):$title }}</title>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Stylesheets -->
        <link rel="stylesheet" href="{{asset('css/bootstrap-grid.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/style.css')}}" />
        <link rel="stylesheet" href="{{asset('css/toastr.css')}}" />
        @stack('css')
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" ></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                @include('layouts.leftbar')
                <div class="col-12 col-md-8">
                    @include('layouts.navigation')    
                    {{ $slot }}
                </div>
                @include('layouts.rightbar')
            </div>
            @include('layouts.footer')
        </div>
        @include('components.errorhandler')
        @stack('js')
    </body>
</html>
