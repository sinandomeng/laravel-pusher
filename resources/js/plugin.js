(function (w, d, $) {

    'use strict'

    // default d.write is throwing an issue
    // read here: https://stackoverflow.com/a/19757717
    d.write = function (html) {
        var scripts = d.getElementsByTagName("script")
        var lastScript = scripts[scripts.length - 1]

        lastScript.insertAdjacentHTML("beforebegin", html)
    }
    
    function defineChatbot() {
        var Chatbot = {}

        Chatbot.init = function () {
            if (arguments[0] !== "undefined" && typeof arguments[0] === "object") {
                initEventHandler()
                initBotUI(arguments[0])
                initBotConfigs(arguments[0])
            } else {
                throw Error("Chatbot: Invalid arguments supplied.")
            }
        }

        return Chatbot
    }

    // function for handling event handlers such as opening and closing the chatbot
    function initEventHandler() {
        $(d).on("click", ".bot-toggler, .bot-close", function () {
            $(".bot-toggler").toggleClass('open')
            $(".bot-wrapper").toggleClass('open')
        })
    }

    // function that is responsible for displaying the UI of the chatbot
    function initBotUI() {
        const PARAMS = arguments[0]

        d.write(`
            <div class="chatbot-wrapper">
                <div class="bot-toggler">
                    <img src="${PARAMS.imgChat}" alt="Chat Icon" />
                </div>

                <div class="bot-wrapper">
                    <div class="bot-header">
                        <div class="bot-heading">
                            <h5 class="bot-title">FiliPay</h5>
                            <small class="bot-sub-title">Welcome to FiliPay! Please talk to our AI for quick assistance.</small>
                        </div>

                        <div class="bot-close">
                            <i class="fa fa-times fa-lg" aria-hidden="true"></i>
                        </div>
                    </div>

                    <div class="bot-body">
                        <div class="bot-bubble bot-message">
                            <div class="bot-image"> <img src="${PARAMS.imgBot}" /> </div>
                            <div class="bot-content">
                                Hello there! Need help? You can ask me anything in regards with FiliPay. I will try to quickly get back to you.
                            </div>
                        </div>
                    </div>

                    <div class="bot-footer">
                        <form id="chat-form" autocomplete="off">
                            <input type="text" id="bot-input" size="80" value="" placeholder="Ask something..." />
                            <button type="submit" id="bot-action">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        `)
    }

    // function where configuration files for the bot are being declared
    function initBotConfigs() {
        const PARAMS = arguments[0]

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
        AWS.config.region = PARAMS.configKeys.region
        AWS.config.credentials = new AWS.CognitoIdentityCredentials({
            IdentityPoolId: PARAMS.configKeys.identityPoolId
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
                    <div class="bot-image"> <img src="${PARAMS.imgUser}" width="40px" height="40px" onerror="this.src='${PARAMS.imgUser}'" /> </div>
                </div>
            `

            conversationDiv.append(requestPara)
            conversationDiv.animate({ scrollTop: conversationDiv.prop('scrollHeight') }, 800)
        }

        function showResponse(lexMessage) {
            var message = lexMessage.message

            var replaceChars = {
                'BASE_URL':  PARAMS.baseUrl,
                'USER_NAME': PARAMS.name,
                'USER_ID':   PARAMS.id
            }

            var newLexMessage = message.replace(/BASE_URL|USER_NAME|USER_ID/gi, function (match) {
                return replaceChars[match]
            })

            var responsePara = `
                <div class="bot-bubble bot-message">
                    <div class="bot-image"> <img src="${PARAMS.imgBot}" width="40px" height="40px" /> </div>
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
                    <div class="bot-image"> <img src="${PARAMS.imgBot}" width="40px" height="40px" /> </div>
                    <div class="bot-content"> ${daText} </div>
                </div>
            `

            conversationDiv.append(errorPara)
            conversationDiv.animate({ scrollTop: conversationDiv.prop('scrollHeight') }, 800)
        }
    }

    if (typeof (Chatbot) === "undefined") {
        w.Chatbot = defineChatbot()
    }

}(window, document, jQuery))