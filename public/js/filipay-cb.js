(function ( $ ) {

    function chatbot_init() {
        // set the focus to the input box
        $('#wisdom').focus()
    
        // chat form on submit handler
        $('#chat-form').on('submit', function (e) {
            e.preventDefault()
            $('#wisdom').prop('disabled', true)
            pushChat()
        })
    
        // initialize the Amazon Cognito credentials provider
        AWS.config.region = 'us-east-1'
        AWS.config.credentials = new AWS.CognitoIdentityCredentials({
            IdentityPoolId: 'us-east-1:cf7e20d2-499d-4ee1-b672-e07d9f5ef433',
        })
    
        var lexRuntime = new AWS.LexRuntime()
        var lexUserId = 'chatbot-demo' + Date.now()
        var sessionAttributes = {}
        var conversationDiv = $('.cb-body')
    
        function pushChat() {
            // text/chat source
            var wisdomText = document.getElementById('wisdom')
    
            // if there is text to be sent...
            if (wisdomText && wisdomText.value && wisdomText.value.trim().length > 0) {
                // disable input to show we're sending it
                var userText = wisdomText.value.trim()
                wisdomText.value = '...'
                wisdomText.locked = true
    
                showRequest(userText)
    
                // send it to the Lex runtime
                var params = {
                    botAlias: '$LATEST',
                    botName: 'GreyhoundBot',
                    inputText: userText,
                    userId: lexUserId,
                    sessionAttributes: sessionAttributes
                }
    
                lexRuntime.postText(params, function (err, data) {
                    $('#wisdom').prop('disabled', false)
    
                    if (err) {
                        console.log(err, err.stack)
                        showError('Error:  ' + err.message + ' (see console for details)')
                    }
    
                    if (data) {
                        // capture the sessionAttributes for the next cycle
                        sessionAttributes = data.sessionAttributes
                        // show response and/or error/dialog status
                        showResponse(data)
                    }
    
                    // re-enable input
                    wisdomText.value = ''
                    wisdomText.locked = false
                })
            }
    
            // we always cancel form submission
            return false
        }
    
        function showRequest(lexRequest) {
            var requestPara = `
                <div class="lex-bubble lex-request">
                    <div class="content">
                        ${lexRequest}
                    </div>
                    <img src='https://proxy.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn0.iconfinder.com%2Fdata%2Ficons%2Favatars-8%2F128%2Favatar-23-2-512.png&f=1' />
                </div>
            `
            conversationDiv.append(requestPara)
            conversationDiv.animate({ scrollTop: conversationDiv.prop( 'scrollHeight' )}, 800 )
        }
    
        function showResponse(lexMessage) {
            var responsePara = `
                <div class="lex-bubble lex-message">
                    <img src="https://proxy.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.pixabay.com%2Fphoto%2F2017%2F10%2F24%2F00%2F39%2Fbot-icon-2883144__340.png&f=1" />
                    <div class="content">
                        ${lexMessage.message}
                    </div>
                </div>
            `
    
            if (lexMessage.dialogState === 'ReadyForFulfillment') {
                conversationDiv.append('<div>Intent is ready for fullfillment.</div>')
            }
    
            conversationDiv.append(responsePara)
            conversationDiv.animate({ scrollTop: conversationDiv.prop( 'scrollHeight' )}, 800 )
    
            // set the focus to the input box
            $('#wisdom').focus()
        }
    
        function showError(daText) {
            var errorPara = '<div class="lex-bubble lex-error">' + daText + '</div>'

            conversationDiv.append(errorPara)
            conversationDiv.animate({ scrollTop: conversationDiv.prop( 'scrollHeight' )}, 800 )
        }
    }

    // dom ready ...
    $(function () {
        chatbot_init()

        $('.cb-toggler').click(function (e) {
            if (e.target !== this) {
                return true;
            } else {
                $(this).addClass('open')
            }
        })

        $('.cb-close').click(function () {
            $('.cb-toggler').removeClass('open')
        })
    })

})( jQuery )
