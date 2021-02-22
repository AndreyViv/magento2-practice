define(['jquery'], function ($) {
    return function (config, element) {
        /*let text = `${$(element).text}\n${config.value.text} and ${config.value.number}`;*/
        $(element).text(config.text);
        console.log(config.text);
    }
});

