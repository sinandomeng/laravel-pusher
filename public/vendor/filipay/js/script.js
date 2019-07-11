$(function () {

    // Init Chatbot
    Chatbot.init({
        id: 1,
        name: 'John',
        baseUrl: BASE_URL,
        imgBot:  BASE_URL + '/vendor/filipay/img/bot-icon.png',
        imgUser: BASE_URL + '/vendor/filipay/img/user-icon.png',
        imgChat: BASE_URL + '/vendor/filipay/img/chat-icon.png',
        configKeys: {
            region: 'us-east-1',
            identityPoolId: 'us-east-1:cf7e20d2-499d-4ee1-b672-e07d9f5ef433'
        }
    })

})
