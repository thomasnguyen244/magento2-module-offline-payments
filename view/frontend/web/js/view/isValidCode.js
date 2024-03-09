define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/additional-validators',
        'Thomas_OfflinePayments/js/model/isValidCode'
    ],
    function (Component, additionalValidators, bsCodeValidation) {
        'use strict';
        additionalValidators.registerValidator(bsCodeValidation);
        return Component.extend({});
    }
);
