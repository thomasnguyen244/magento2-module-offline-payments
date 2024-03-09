<?php
/**
 * WorkWithThomas
 *
 * Do not edit or add to this file if you wish to upgrade to newer versions in the future.
 * If you wish to customise this module for your needs.
 * Please contact us https://workwiththomas.com/contact/.
 *
 * @category   WorkWithThomas
 * @package    Thomas_OfflinePayments
 * @copyright  Copyright (C) 2024 WorkWithThomas,.Jsc (https://workwiththomas.com/)
 * @license    https://workwiththomas.com/magento2-extension-license/
 */
declare(strict_types=1);

namespace Thomas\OfflinePayments\Observer;

use Magento\Quote\Api\Data\PaymentInterface;

/**
 * Class SalesOrderPaymentBeforeSavedObserver
 *
 * @package Thomas\OfflinePayments\Observer
 */
class SalesQuotePaymentBeforeSavedObserver implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * @param \Magento\Framework\Event\Observer $observer
     * @return $this
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        if (empty($observer->getEvent()->getPayment())) {
            return $this;
        }

        $payment = $observer->getEvent()->getPayment();
        $additionalData = $payment->getData(PaymentInterface::KEY_ADDITIONAL_DATA);

        if (isset($additionalData['tmo_costcentercode'])) {
            $payment->setTmoCostcentercode($additionalData['tmo_costcentercode']);
        }

        return $this;
    }
}
