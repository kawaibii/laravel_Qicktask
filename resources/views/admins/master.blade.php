<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ trans('message.title_browser') }}</title>
    <base href="{{ asset('') }}">
    <link href="{{ asset('bootstrap/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('bower_components/css/css.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">
<div id="wrapper">
    @include('admins.pages.menu')
    <div id="content-wrapper" class="d-flex flex-column">
       @yield('content')
    </div>
</div>
<script src="{{ asset('bootstrap/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('bootstrap/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('bootstrap/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('bootstrap/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bootstrap/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/demo/datatables-demo.js') }}"></script>
</body>

</html>
