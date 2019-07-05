<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>FiliPay Global Chatbot</title>

    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 4.7 -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- AWS SDK -->
    <script src="https://sdk.amazonaws.com/js/aws-sdk-2.41.0.min.js"></script>

    <!-- Additional or Custom Stylesheet -->
    <link href="css/filipay-cb.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="cb-toggler">
        <div class="cb-wrapper">
            <div class="cb-header">
                <img class="cb-logo" src="https://bot-1561521600.herokuapp.com/img/mobile-logo.png" alt="Greyhound Logo">

                <div class="cb-heading">
                    <h5 class="cb-title">Greyhound</h5>
                    <small class="cb-sub-title">Welcome to Greyhound! Please talk to our AI for quick assistance.</small>
                </div>

                <div class="cb-close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </div>
            </div>

            <div class="cb-body">
                <div class="lex-bubble lex-message">
                    <img src="https://proxy.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.pixabay.com%2Fphoto%2F2017%2F10%2F24%2F00%2F39%2Fbot-icon-2883144__340.png&f=1" />
                    <div class="content">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae qui, dicta nobis numquam error tempore ut ex quibusdam quas libero repellat perspiciatis, veniam et eveniet accusantium tenetur aliquid fugiat illo?
                    </div>
                </div>
                <div class="lex-bubble lex-request">
                    <div class="content">
                        Hey
                    </div>
                    <img src='https://proxy.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn0.iconfinder.com%2Fdata%2Ficons%2Favatars-8%2F128%2Favatar-23-2-512.png&f=1' />
                </div>
            </div>

            <div class="cb-footer">
                <form id="chat-form" autocomplete="false">
                    <input type="text" id="wisdom" size="80" value="" placeholder="Ask something...">
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- LiveReload for development only -->
    @if (env('APP_ENV') == 'local')
        <script src="http://localhost:35729/livereload.js"></script>
    @endif

    <!-- Additional or Custom Javascript -->
    <script type="text/javascript" src="js/filipay-cb.js"></script>

</body>

</html>