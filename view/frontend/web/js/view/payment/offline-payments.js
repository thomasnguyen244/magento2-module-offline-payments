define([
    'uiComponent',
    'Magento_Checkout/js/model/payment/renderer-list'
], function (Component, rendererList) {
    'use strict';

    rendererList.push(
        {
            type: 'tmopayment',
            component: 'Thomas_OfflinePayments/js/view/payment/method-renderer/tmopayment-method'
        }
    );

    /** Add view logic here if needed */
    return Component.extend({});
});
