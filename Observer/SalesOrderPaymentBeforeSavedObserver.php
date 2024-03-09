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

/**
 * Class SalesOrderPaymentBeforeSavedObserver
 *
 * @package Thomas\OfflinePayments\Observer
 */
class SalesOrderPaymentBeforeSavedObserver implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * @var \Magento\Webapi\Controller\Rest\InputParamsResolver
     */
    protected $inputParamsResolver;

    /**
     * @var \Magento\Framework\App\RequestInterface
     */
    protected $requestInterface;

    /**
     * @param \Magento\Webapi\Controller\Rest\InputParamsResolver $inputParamsResolver
     * @param \Magento\Framework\App\RequestInterface $requestInterface
     */
    public function __construct(
        \Magento\Webapi\Controller\Rest\InputParamsResolver $inputParamsResolver,
        \Magento\Framework\App\RequestInterface $requestInterface
    ) {
        $this->inputParamsResolver = $inputParamsResolver;
        $this->requestInterface = $requestInterface;
    }

    /**
     * @param \Magento\Framework\Event\Observer $observer
     * @return $this
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $payment = $observer->getEvent()->getPayment();
        if (empty($payment)) {
            return $this;
        }

        if ($payment->getMethod() != 'tmopayment') {
            return $this;
        }

        if ($payment->getTmoCostcentercode()) {
            return $this;
        }

        // This is used while creating an order from the backend by an administrator.
        if ($this->requestInterface->getFullActionName() == 'sales_order_create_save') {
            $paymentFromPosting = $this->requestInterface->getParam('payment');
            if ($paymentFromPosting && isset($paymentFromPosting['tmo_costcentercode'])) {
                $payment->setTmoCostcentercode($paymentFromPosting['tmo_costcentercode']);
            }
            return $this;
        }

        // This is used while creating an order from the frontend by a customer.
        $inputParams = $this->inputParamsResolver->resolve();

        foreach ($inputParams as $inputParam) {
            if ($inputParam instanceof \Magento\Quote\Model\Quote\Payment) {
                $additionalData = $inputParam->getData('additional_data');
                if (isset($additionalData['tmo_costcentercode'])) {
                    $payment->setTmoCostcentercode($additionalData['tmo_costcentercode']);
                    break;
                }
            }
        }

        return $this;
    }
}
