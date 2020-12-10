<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>

    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    <style>
        button:disabled,
        button[disabled]{
            border: 1px solid #999999;
            background-color: #cccccc;
            color: #666666;
        }

        .error{
            color: red;
        }

    </style>
    @yield('script_css')
</head>
<body>

@yield('content')



<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/vue.js')}}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


@yield('script_js')
</body>
</html>