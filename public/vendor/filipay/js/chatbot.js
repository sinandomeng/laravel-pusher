(function ($) {

    function chatbot_init() {
        var userInput = $('#bot-input')
        var userButton = $('#bot-action')

        // chat form on submit handler
        $('#chat-form').on('submit', function (e) {
            e.preventDefault()
            userInput.prop('disabled', true)
            userButton.prop('disabled', true)
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
            // if there is text to be sent...
            if (userInput.val() && userInput.val().trim().length > 0) {
                // disable input to show we're sending it
                var userText = userInput.val().trim()
                userInput.val('...')

                showRequest(userText)

                // send it to the Lex runtime
                var params = {
                    botAlias: '$LATEST',
                    botName: 'FiliPayGlobal',
                    inputText: userText,
                    userId: lexUserId,
                    sessionAttributes: sessionAttributes
                }

                lexRuntime.postText(params, function (err, data) {
                    userInput.prop('disabled', false)
                    userButton.prop('disabled', false)

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
                    userInput.val('')
                })
            } else {
                userInput.prop('disabled', false)
                userButton.prop('disabled', false)
            }
        }

        function showRequest(lexRequest) {
            var requestPara = `
                <div class="bot-bubble bot-request">
                    <div class="bot-content"> ${lexRequest} </div>
                    <div class="bot-image"> <img src="${AUTH_USER.avatar_user}" width="40px" height="40px" onerror="this.src='${AUTH_USER.avatar_default}'" /> </div>
                </div>
            `

            conversationDiv.append(requestPara)
            conversationDiv.animate({ scrollTop: conversationDiv.prop('scrollHeight') }, 800)
        }

        function showResponse(lexMessage) {
            var message = lexMessage.message

            var replaceChars = {
                'BASE_URL': BASE_URL,
                'USER_NAME': AUTH_USER.name,
                'USER_ID': AUTH_USER.id
            }

            var newLexMessage = message.replace(/BASE_URL|USER_NAME|USER_ID/gi, function (match) {
                return replaceChars[match]
            })

            var responsePara = `
                <div class="bot-bubble bot-message">
                    <div class="bot-image"> <img src="${AUTH_USER.avatar_bot}" width="40px" height="40px" /> </div>
                    <div class="bot-content"> ${newLexMessage} </div>
                </div>
            `

            if (lexMessage.dialogState === 'ReadyForFulfillment') {
                conversationDiv.append('<div>Intent is ready for fullfillment.</div>')
            }

            conversationDiv.append(responsePara)
            conversationDiv.animate({ scrollTop: conversationDiv.prop('scrollHeight') }, 800)

            // set the focus to the input box
            userInput.focus()
        }

        function showError(daText) {
            var errorPara = `
                <div class="bot-bubble bot-message">
                    <div class="bot-image"> <img src="${AUTH_USER.avatar_bot}" width="40px" height="40px" /> </div>
                    <div class="bot-content"> ${daText} </div>
                </div>
            `

            conversationDiv.append(errorPara)
            conversationDiv.animate({ scrollTop: conversationDiv.prop('scrollHeight') }, 800)
        }
    }

    chatbot_init()

}(jQuery))