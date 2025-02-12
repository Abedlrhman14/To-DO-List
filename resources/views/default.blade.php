<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','To DO App')</title>
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" >
  </head>
  <body class="d-flex flex-column mt-5 h-100">
   <div>
    @include('include.header')
    @yield('content')


    @include('include.footer ')
   </div>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  </body>
</html>
