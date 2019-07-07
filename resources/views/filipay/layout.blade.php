<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>FiliPay Global Chatbot</title>

    <!-- Bootstrap -->
    <link href="{{ url('vendor/filipay/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- AWS SDK -->
    <script src="{{ url('vendor/filipay/js/aws-sdk-2.41.0.min.js') }}"></script>

    <!-- Additional or Custom Stylesheet -->
    <link href="{{ url('vendor/filipay/css/filipay-cb.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    @yield('content')

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="{{ url('js/jquery-3.3.1.min.js') }}"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="{{ url('vendor/filipay/js/bootstrap.min.js') }}"></script>

    <!-- LiveReload for development only -->
    @if (env('APP_ENV') == 'local')
        <!-- <script src="http://localhost:35729/livereload.js"></script> -->
    @endif

    <!-- Global and Important Declarations -->
    <script type="text/javascript">
        const BASE_URL = '{{ url('/') }}'
    </script>

    <!-- Additional or Custom Javascript -->
    <script type="text/javascript" src="{{ url('vendor/filipay/js/filipay-cb.js') }}"></script>

</body>

</html>