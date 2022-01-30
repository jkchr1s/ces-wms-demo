<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- include our CSS --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <title>@yield('title', 'Welcome') | CES Demo</title>
</head>
<body>
@include('navbar')
@yield('content')
{{-- include base javascript --}}
<script type="text/javascript" src="{{ mix('js/base.js') }}"></script>
{{-- include additional scripts, as needed --}}
@stack('scripts')
</body>
</html>
