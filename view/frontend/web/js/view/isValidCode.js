define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/additional-validators',
        'Thomas_OfflinePayments/js/model/isValidCode'
    ],
    function (Component, additionalValidators, tmoCodeValidation) {
        'use strict';
        additionalValidators.registerValidator(tmoCodeValidation);
        return Component.extend({});
    }
);
