<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome</title>
    <link rel="stylesheet" href="{{asset('css/site/default/normalize.css')}}" />
    <link rel="stylesheet" href="{{asset('css/site/default/foundation.min.css')}}" />
    <script src="{{asset('js/site/default/vendor/modernizr.js')}}"></script>
</head>
<body>

@yield('content')

<script src="{{asset('js/site/default/vendor/jquery.js')}}"></script>
<script src="{{asset('js/site/default/foundation.min.js')}}"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>
