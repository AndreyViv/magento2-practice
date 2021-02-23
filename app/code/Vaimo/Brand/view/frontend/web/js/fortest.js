/**
 * Vaimo Brand
 *
 * @author Andrii Vivcharyk <andrii.vivcharyk@vaimo.com>
 * @package Vaimo_Brand
 * @copyright Copyright (c) 2021 Vaimo (http://www.vaimo.com)
 */

define(['jquery'], function ($) {
    return function (config, element) {
        /*let text = `${$(element).text}\n${config.value.text} and ${config.value.number}`;*/
        $(element).text(config.text);
        console.log(config.text);
    }
});

