(function () {

    var ChatBot = function () {
        if (arguments[0] && typeof arguments[0] === "object") {
            validateArguments(arguments[0])
        } else {
            throw Error("Invalid arguments supplied.")
        }
    }

    function validateArguments(options) {
        if (options.hasOwnProperty('id')) {
            console.log('You have an ID')
        } else {
            throw Error("Id property is missing.")
        }
    }

    this.ChatBot = ChatBot

}())