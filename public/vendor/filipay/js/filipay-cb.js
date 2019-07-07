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
        var conversationDiv = $('.bot-body')
    
        function pushChat() {
            // text/chat source
            var wisdomText = document.getElementById('wisdom')
    
            // if there is text to be sent...
            if (wisdomText && wisdomText.value && wisdomText.value.trim().length > 0) {
                // disable input to show we're sending it
                var userText = wisdomText.value.trim()
                wisdomText.value = '...'
    
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
                })
            }
    
            // we always cancel form submission
            return false
        }
    
        function showRequest(lexRequest) {
            var requestPara = `
                <div class="bot-bubble bot-request">
                    <div class="content">
                        ${lexRequest}
                    </div>
                    <img class="bot-image" src="${BASE_URL}/vendor/filipay/img/user-icon.png" />
                </div>
            `

            conversationDiv.append(requestPara)
            conversationDiv.animate({ scrollTop: conversationDiv.prop( 'scrollHeight' )}, 800 )
        }
    
        function showResponse(lexMessage) {
            var responsePara = `
                <div class="bot-bubble bot-message">
                    <img class="bot-image" src="${BASE_URL}/vendor/filipay/img/bot-icon.png" />
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
            var errorPara = `<div class="bot-bubble bot-error">${daText}</div>`

            conversationDiv.append(errorPara)
            conversationDiv.animate({ scrollTop: conversationDiv.prop( 'scrollHeight' )}, 800 )
        }
    }

    // dom ready ...
    $(function () {

        chatbot_init()

        var toggler = $('.bot-toggler')
        var wrapper = $('.bot-wrapper')

        $('.bot-toggler, .bot-close').click(function () {
            toggler.toggleClass('open')
            wrapper.toggleClass('open')
        })

    })

})( jQuery )
