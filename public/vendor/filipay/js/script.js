var ChatBot = new ChatBot(AUTH_USER);

console.log(ChatBot)

$(function () {
    var toggler = $('.bot-toggler')
    var wrapper = $('.bot-wrapper')

    $('.bot-toggler, .bot-close').click(function () {
        toggler.toggleClass('open')
        wrapper.toggleClass('open')
    })
})
