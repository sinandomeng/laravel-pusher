<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>FiliPay Global Chatbot</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('vendor/filipay/css/bootstrap.min.css') }}" />
    
    <!-- AWS SDK -->
    <script src="{{ asset('vendor/filipay/js/aws-sdk-2.41.0.min.js') }}"></script>
    
    <!-- Additional or Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('vendor/filipay/css/chatbot.css') }}" />
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

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
    <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="{{ asset('vendor/filipay/js/bootstrap.min.js') }}"></script>

    <!-- LiveReload for development only -->
    @if (env('APP_ENV') == 'local')
        <script type="text/javascript" src="http://localhost:35729/livereload.js"></script>
    @endif

    <!-- Global and Important Declarations -->
    <script type="text/javascript">
        const BASE_URL = '{{ url('/') }}'
        const AUTH_USER = {
            id: '1',
            name: 'Admin',
            avatar_bot: BASE_URL + '/vendor/filipay/img/bot-icon.png',
            avatar_user: BASE_URL + '/vendor/filipay/img/user-icon.png',
            avatar_default: BASE_URL + '/vendor/filipay/img/user-icon.png'
        }
    </script>

    <!-- Chatbot Script -->
    <script type="text/javascript" src="{{ asset('vendor/filipay/js/chatbot.js?ver=' . time() ) }}"></script>

    <!-- Plugin Script -->
    <script type="text/javascript" src="{{ asset('vendor/filipay/js/plugin.js?ver=' . time() ) }}"></script>

    <!-- Additional Script -->
    <script type="text/javascript" src="{{ asset('vendor/filipay/js/script.js?ver=' . time() ) }}"></script>

</body>

</html>