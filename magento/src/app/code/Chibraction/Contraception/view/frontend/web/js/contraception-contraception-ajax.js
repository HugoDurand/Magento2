define([
    'jquery',
    'Magento_Ui/js/modal/modal',
    'jquery/ui'
], function ($, modal) {
    'use strict';

    $.widget('chibraction.contraceptionContraceptionAjax', {

        options: {
            url: false,
            contraceptionId: null
        },

        _create: function () {
            alert('ok !');
        }

    });

    return $.chibraction.contraceptionContraceptionAjax;
});
