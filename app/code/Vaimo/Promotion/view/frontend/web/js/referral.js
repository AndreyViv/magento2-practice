/**
 * Vaimo Promotion
 *
 * @author Andrii Vivcharyk <andrii.vivcharyk@vaimo.com>
 * @package Vaimo_Promotion
 * @copyright Copyright (c) 2021 Vaimo (http://www.vaimo.com)
 */

define(['jquery'], function ($) {
    return function (config) {
        $('#generate-link-button').click(function () {
            let referralLink =
                `${config.referBase}${Math.random().toString(36).substring(8)}`;

            $('#generate-link-button').hide();
            $('#spinner-link-button').show();

            setTimeout(function () {
                $('#spinner-link-button').hide();
                $('#copy-link-button').show();
                $('#link-input').val(referralLink);
            }, 2000)
        });

        $('#copy-link-button').click(function () {
            let $tmp = $('<input>');
            $('body').append($tmp);
            $tmp.val($('#link-input').val()).select();
            document.execCommand('Copy');
            $tmp.remove();

            $('#copy-link-button').hide();
            $('#done-link-button').show();

            setTimeout(function () {
                $('#done-link-button').hide();
                $('#copy-link-button').show();
            }, 1000)
        });
    }
});
