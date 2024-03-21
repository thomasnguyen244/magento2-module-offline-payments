define([
    'Magento_Checkout/js/view/payment/default',
    'jquery',
    'mage/validation'
], function (Component, $) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Thomas_OfflinePayments/payment/tmopayment-form',
            tmoCostcentercode: ''
        },

        /** @inheritdoc */
        initObservable: function () {
            this._super()
                .observe('tmoCostcentercode');

            return this;
        },

        /**
         * @return {Object}
         */
        getData: function () {
            return {
                method: this.item.method,
                'additional_data': {
                    'tmo_costcentercode': this.tmoCostcentercode()
                }
            };
        },

        getMaxLength: function () {
            return typeof(window.checkoutConfig.tmo_code_length) != undefined && window.checkoutConfig.tmo_code_length != "" && window.checkoutConfig.tmo_code_length != 0 ? window.checkoutConfig.tmo_code_length : 10;
        },

        /**
         * @return {jQuery}
         */
        validate: function () {
            var form = 'form[data-role=tmopayment-form]';

            return $(form).validation() && $(form).validation('isValid');
        }
    });
});
